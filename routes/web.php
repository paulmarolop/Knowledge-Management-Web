<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\CommentController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

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

// Route::get('/', function () {
//     return view('home', [
//         "title" => "Home",
//         'active' => 'home'
//     ]);
// });

Route::get('/', [PostController::class, 'index']);

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        'active' => 'about',
        "name" => "Paul Rio Marolop",
        "email" => "paul@gmail.com",
        "image" => "killua.jpg"
    ]);
});



Route::get('/posts', [PostController::class, 'index']);
//halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);



Route::get('/register', [RegisterController::class, 'index'])->middleware('auth', 'isAdmin');
Route::post('/register', [RegisterController::class, 'store']);



// Route::get('/dashboard', function(){
//     return view('dashboard.index');
// })->middleware('auth','blockIP');
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

// Route::get('/categories/{category:slug}', function(Category $category){
//         return view('posts', [
//             'title' => "Post by Category : $category->name",
//             'active' => 'categories',
//             'posts' => $category->posts->load(['category', 'author'])
//         ]);
// });
// Route::get('/authors/{author:username}', function(User $author){
//         return view('posts', [
//             'title' => "Post By Author : $author->name",
//             'active' => 'posts',
//             'posts' => $author->posts->load(['category', 'author'])
//         ]);
// });

// Comment
Route::post('comments', [CommentController::class, 'store']);
Route::post('delete-comment', [CommentController::class, 'destroy']);

Route::resource('/dashboard/users', AdminUserController::class)->middleware('isAdmin');
