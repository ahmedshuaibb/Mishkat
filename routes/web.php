<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
// list all posts at home page
Route::get('home', [Controllers\PostController::class,'index1']);







Route::get('aboutus', function () {
    return view('aboutus');
});

Route::get('contactus', function () {
    return view('contactus');
});
Route::get('allposts', function () {
    return view('posts');
});
// show all posts that belong to this category
Route::get('allpost/{category}', [Controllers\CategoryController::class,'getPosts'])
-> name('categoryposts.show');

Route::get('postdetails/{post}', [Controllers\PostController::class,'singlePost'] )
-> name('singlePost.show');


Route::get('admin', function () {
    return view('admin.index');
});


Route::resource('categories', Controllers\CategoryController::class);


Route::resource('posts', Controllers\PostController::class);


Route::resource('comments', Controllers\CommentController::class);
