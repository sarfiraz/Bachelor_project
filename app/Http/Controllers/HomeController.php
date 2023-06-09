<?php

namespace App\Http\Controllers;


use App\Models\Website;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $userId = Auth::id();
        $sites = Website::where('user_id', $userId)->get();
        return view('home', compact('sites'));

    }
}











//
//public function show($id)
//{
//    $userId = Auth::id();
//    $user = Auth::user();
//    $website = Website::find($id);
//
//    if ($website) {
//        $tags = $website->subpages()->with('tags')->get()->pluck('tags')->flatten();
//    }
//    $tagsArray = $tags->pluck('tag_value', 'key')->toArray();
//
//    // Get the images for the user
//    $images = Image::where('user_id', $userId)->where('website_id', $id)
//        ->where(function($query) {
//            $query->where('key', '!=', 'bg');
//        })->orderBy('created_at', 'desc')
//        ->get();
//
//    $bg_image = Image::where('user_id', $userId)->where('website_id', $id)
//        ->where('key', 'bg')->latest('created_at')
//        ->first();
//
//    if ($bg_image != null){
//
//        $bg_image_url = Storage::disk('s3')->url($bg_image->path);
//
//        // Create an empty array to hold the image URLs
//        $imageUrls = [];
//        $references = $this->getIdsFromTemplate('img');
//
//        // Loop through each image and add its URL to the array
//        foreach ($images as $image) {
//            $url = Storage::disk('s3')->url($image->path);
//            $imageUrls[] = $url;
//        }
//        array_unshift($references, "bg");
//        array_unshift($imageUrls, $bg_image_url);
//
//        if(count($imageUrls) > count($references)){
//            $imageUrls = array_splice($imageUrls, 0, count($references));
//        }
//        elseif (count($imageUrls) < count($references)){
//            $numValues = count($imageUrls);
//            $default = null;
//            $imageUrls = array_merge($imageUrls, array_fill($numValues, count($references) - $numValues, $default));
//        }// create a new array with five elements, and set the first three elements to $values
//        $imagesWithId = array_combine($references, $imageUrls);
//
//    }
//    $statuses = DisplayStatus::where('website_id', $website->id)
//        ->latest('created_at')
//        ->get(['element_id', 'display'])
//        ->map(function ($status) {
//            return [
//                ($status->element_id ?? 'null') => $status->display ?: 0
//            ];
//        })
//        ->reduce(function ($result, $item) {
//            return array_merge($result, $item);
//        }, []);
//
//    $subpages = Subpage::where('website_id', $website->id)
//        ->latest('created_at')
//        ->get(['key', 'display'])
//        ->map(function ($page) {
//            return [
//                ($page->key ?? 'null') => $page->display ?: 0
//            ];
//        })
//        ->reduce(function ($result, $item) {
//            return array_merge($result, $item);
//        }, []);
//
//    $merged_Page_Status = array_merge($statuses, $subpages);
//
//    $website_title = $website->title;
//    // Return the view with the image URLs
//    return view('website', compact('imagesWithId', 'merged_Page_Status', 'tagsArray', 'website_title', 'user'));
//
//}
