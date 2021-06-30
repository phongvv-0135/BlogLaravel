<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Models\User;
use App\Models\Category;


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
    $posts = Post::latest()->get();
    return view('posts.posts', [
        'posts'=> $posts
    ]);
});
Route::get('/post/{post:slug}', function (Post $post) {
    return view('posts.post', [
        'post'=> $post
    ]);
});

Route::get('/category/{category:slug}', function (Category $category) {
    // ddd($category->post());
    return view('posts.posts', [
        'posts' => $category->post
    ]);
});

Route::get('/author/{user:username}', function (User $user) {
    // ddd($user->post());
    return view('posts.posts', [
        'posts' => $user->post
    ]);
});
