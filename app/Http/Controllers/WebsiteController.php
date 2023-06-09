<?php

namespace App\Http\Controllers;

use App\Models\DisplayStatus;
use App\Models\Image;
use App\Models\Subpage;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use DOMDocument;
use DOMXPath;


class WebsiteController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    /**
     * Display a listing of the resource.
     */



    public function getIdsFromTemplate($elementType)
    {
        // Read the contents of the template
        $template = file_get_contents(resource_path('views/website.blade.php'));

        // Create a new DOMDocument and load the template contents
        $doc = new DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML($template, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        // Create a new DOMXPath object and query for all elements with the specified type and id attribute
        $xpath = new DOMXPath($doc);
        $elements = $xpath->query("//{$elementType}[@id]");

        // Extract the id attributes from the elements
        $ids = [];
        foreach ($elements as $element) {
            $ids[] = $element->getAttribute('id');
        }

        // Return the array of ids
        return $ids;
    }


    public function index()
    {
    }
    public function upload(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $imgIds = $this->getIdsFromTemplate('img');
        $refs = count($imgIds);
        return view('upload', compact('refs', 'id'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request, $id)
    {
        $userId = Auth::id();

        $newSite = $this->createNewWebsite($userId, $id, $request->title, $request->description);

        $website = $this->findWebsite($userId, $id);

        $this->validateRequest($request);

        $this->storeBackgroundImage($request, $userId, $website);

        $this->storeImages($request, $userId, $website);

        $this->checkDisplayStatusTable($website->id);

        $this->checkSubpagesTable($website->id);

        return redirect()->route('home');
    }
    private function createNewWebsite($userId, $templateId, $title, $description)
    {
        $newSite = new Website;
        $newSite->user_id = $userId;
        $newSite->template_id = $templateId;
        $newSite->title = $title;
        $newSite->description = $description ?? "No Description";
        $newSite->save();

        return $newSite;
    }

    private function findWebsite($userId, $templateId)
    {
        $website = Website::where('user_id', $userId)
            ->where('template_id', $templateId)
            ->latest('created_at')
            ->first();

        if (!$website) {
            abort(500, "Website not found");
        }

        return $website;
    }

    private function validateRequest(Request $request)
    {
        $request->validate([
            'bg_image' => 'required|image',
            'images.*' => 'required|image',
        ]);
    }

    private function storeBackgroundImage(Request $request, $userId, $website)
    {
        if ($request->hasFile('bg_image')) {
            $bgImage = $request->file('bg_image');

            if (!$bgImage->isValid() || !in_array($bgImage->getClientOriginalExtension(), ['jpeg', 'jpg', 'png', 'gif'])) {
                abort(400, "Invalid bg_image");
            }

            $bgPath = "images/" . time() . $bgImage->getClientOriginalName();

            $this->storeImageInS3($bgPath, $bgImage);

            $this->storeImageRecord($userId, $bgPath, $website->id, $bgImage->getClientOriginalName(), 'bg');
        }
    }


    private function storeImages(Request $request, $userId, $website)
    {
        if ($request->has('images')) {
            $imgIds = $this->getIdsFromTemplate('img');
            $numImgIds = count($imgIds);
            $curImgId = 0;

            foreach ($request->file('images') as $file) {
                if ($curImgId >= $numImgIds) {
                    break;
                }

                $path = "images/" . time() . $file->getClientOriginalName();

                $this->storeImageInS3($path, $file);

                $this->storeImageRecord($userId, $path, $website->id, $file->getClientOriginalName(), $imgIds[$curImgId % $numImgIds]);

                $curImgId++;
            }
        }
    }


    private function storeImageInS3($path, $file)
    {
            Storage::disk('s3')->put($path, file_get_contents($file));
    }

    private function storeImageRecord($userId, $path, $websiteId, $name, $key)
    {
        $image = new Image;
        $image->user_id = $userId;
        $image->path = $path;
        $image->website_id = $websiteId;
        $image->name = $name;
        $image->key = $key;
        $image->save();
    }

    private function checkDisplayStatusTable($websiteId)
    {
        if (!Schema::hasTable('display_statuses')) {
            abort(500, "Table 'display_statuses' not found");
        }

        $elementIds = $this->getIdsFromTemplate('div');

        foreach ($elementIds as $elementId) {
            if (!DisplayStatus::where('element_id', $elementId)->where('website_id', $websiteId)->exists()) {
                $status = new DisplayStatus();
                $status->element_id = $elementId;
                $status->website_id = $websiteId;
                $status->display = 1;
                $status->save();
            }
        }
    }

    private function checkSubpagesTable($websiteId)
    {
        if (!Schema::hasTable('subpages')) {
            abort(500, "Table 'subpages' not found");
        }

        $elementIds = $this->getIdsFromTemplate('section');

        foreach ($elementIds as $elementId) {
            if (!Subpage::where('key', $elementId)->where('website_id', $websiteId)->exists()) {
                $subpage = new Subpage();
                $subpage->website_id = $websiteId;
                $subpage->key = $elementId;
                $subpage->display = 1;
                $subpage->save();
            }
        }
    }

    public function show($userId, $id)
    {
        $website = $this->findWebsiteById($id, $userId);
        if (!$website) {
            abort(404); // Website not found
        }
        $webId = $website->id;
        $tags = $this->getTagsForWebsite($website);
        $tagsArray = $tags->pluck('tag_value', 'key')->toArray();

        $images = $this->getImagesForWebsite($userId, $id);
        $bgImage = $this->getBackgroundImageForWebsite($userId, $id);

        $imagesWithId = $this->getImageUrls($bgImage, $images);

        $merged_Page_Status = $this->getMergedPageStatus($website);

        $website_title = $website->title;

        return view('website', compact('imagesWithId', 'merged_Page_Status', 'tagsArray', 'website_title','webId','userId'));
    }

    private function findWebsiteById($id, $userId)
    {
        return Website::where('id', $id)
            ->where('user_id', $userId)
            ->first();
    }


    private function getTagsForWebsite($website)
    {
        return $website->subpages()->with('tags')->get()->pluck('tags')->flatten();
    }

    private function getImagesForWebsite($userId, $websiteId)
    {
        return Image::where('user_id', $userId)
                    ->where('website_id', $websiteId)
                   ->where(function($query) {
                $query->where('key', '!=', 'bg');
            })->orderBy('created_at', 'desc')
            ->get();
    }

    private function getBackgroundImageForWebsite($userId, $websiteId)
    {
        return Image::where('user_id', $userId)
            ->where('website_id', $websiteId)
            ->where('key', 'bg')
            ->latest('created_at')
            ->first();
    }

    private function getImageUrls($bgImage, $images)
    {
        $imageUrls = [];
       // $bgImageUrl = Storage::disk('s3')->url($bgImage->path);
        if ($bgImage) {
            $bgImageUrl = Storage::disk('s3')->url($bgImage->path);
            $imageUrls['bg'] = $bgImageUrl;
        }

        foreach ($images as $image) {
            $imageUrl = Storage::disk('s3')->url($image->path);
            $imageUrls[] = $imageUrl;
        }

        $references = $this->getIdsFromTemplate('img');
        array_unshift($references, "bg");

        if(count($imageUrls) > count($references)){
            $imageUrls = array_splice($imageUrls, 0, count($references));
        }
        elseif (count($imageUrls) < count($references)){
            $numValues = count($imageUrls);
            $default = null;
            $imageUrls = array_merge($imageUrls, array_fill($numValues, count($references) - $numValues, $default));
        }// create a new array with five elements, and set the first three elements to $values
        $imagesWithId = array_combine($references, $imageUrls);
        return $imagesWithId;
    }

    private function getMergedPageStatus($website)
    {
        $statuses = DisplayStatus::where('website_id', $website->id)
            ->latest('created_at')
            ->pluck('display', 'element_id')
            ->toArray();

        $subpages = Subpage::where('website_id', $website->id)
            ->latest('created_at')
            ->pluck('display', 'key')
            ->toArray();

        return array_merge($statuses, $subpages);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
