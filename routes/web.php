 <?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/template/{userId}/{id}',[WebsiteController::class, 'show'])->name('template');
Route::post('/contact/{webId}/{userId}', [ContactController::class, 'submit']);
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/templates', [TemplateController::class, 'index'])->name('templates');
Route::get('/sample', function (){return view('templateSample');})->name('sample')->middleware('auth');
Route::get('/upload/{id}', [WebsiteController::class, 'create'])->name('upload');
Route::Post('/upload/{id}', [WebsiteController::class, 'store']);





