<?php

// use App\Http\Controllers\DashboardController;
use App\Models\User;
use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Post;

// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

//closure
Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        'active' => 'home',
        'posts' => Post::all()
    ]);
});

// Route::get('/about', function () {
//     return view('about', [
//         "title" => "About",
//         'active' => 'about',
//         "name" => "Nabilatulhawa",
//         "email" => "naabilath144@gmail.com",
//         "jurusan" => "Teknik Informatika"
//     ]);
// });

//controller
Route::get('/blogs', [PostController::class, 'index']);

// halaman single blog
Route::get('blogs/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs', [
        'title' => "Post By Category :  $category->name",
        'active' => 'categories',
        'posts' => $category->posts
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
    return view('blogs', [
        'title' => "Post By Author : $author->name",
        'active' => 'posts', 
        'posts' => $author->posts->load('category', 'author'),
    ]);
    
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/checkSlug',[ DashboardPostController::class, 'checkSlug'])->middleware('auth');
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');