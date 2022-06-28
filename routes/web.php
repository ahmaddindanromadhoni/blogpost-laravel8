<?php

use App\Http\Controllers\AdminController;
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

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});
Route::get('/about', function () {
    return view('about', [
        "title"     => "About",
        "active"    => "about",
        "nama"      => "Dindan Romadhoni",
        "email"     => "dindanahmad@gmail.com",
        "sekolah"   => "SMK Hasan Kafrawi"
    ]);
});

Route::get('/blog', [PostController::class, 'index']);
// Halaman Single posts 
Route::get('post/{post:slug}',[PostController::class, 'show']);

Route::get('/categories' , function() {
    return view('categories', [
        'title'         => 'Post Categories',
        'active'        => 'categories',
        'categories'    => Category::all()
    ]);
});
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'loginku']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/posts/slugerror', [DashboardPostController::class, 'slugerror'])->middleware('auth');
Route::get('/dashboard/posts/slugCategory', [AdminController::class, 'slugCategory'])->middleware('auth');
// Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminController::class)->except('show')->middleware('auth');


