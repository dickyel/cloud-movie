<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminMovieController;

use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\GenreController;
use App\Http\Controllers\User\MovieController;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;

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
//     return view('welcome');
// });

Route::group(['middleware' => 'guest'], function() {
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('/contact',[ContactController::class,'index'])->name('contact');
    Route::post('/contact',[ContactController::class,'store'])->name('contact.store');
    Route::get('/category',[CategoryController::class,'index'])->name('category');
    Route::get('/category/{id}',[CategoryController::class,'detail'])->name('category.detail');
    Route::get('/genre',[GenreController::class,'index'])->name('genre');
    Route::get('/genre/{id}',[GenreController::class,'detail'])->name('genre.detail');
    Route::get('/movie/{slug}',[MovieController::class,'show'])->name('movie.detail');

    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'dologin']);

});


Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {  
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


Route::group(['middleware' => ['auth', 'checkrole:1'], ], function() {
    Route::get('/admin-dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('category-admin','App\Http\Controllers\Admin\AdminCategoryController');
    Route::get('/movie-admin',[AdminMovieController::class,'index'])->name('movie-admin.index');
    Route::get('/movie-admin/create',[AdminMovieController::class,'create'])->name('movie-admin.create');
    Route::post('/movie-admin/create',[AdminMovieController::class,'store'])->name('movie-admin.store');
    Route::get('/movie-admin/edit/{id}',[AdminMovieController::class,'edit'])->name('movie-admin.edit');
    Route::put('/movie-admin/update/{id}',[ AdminMovieController::class,'update'])->name('movie-admin.update');
    Route::get('/movie-admin/{id}',[ AdminMovieController::class,'destroy'])->name('movie-admin.destroy');
    // route untuk melakukan upload gallery ruangan
    Route::post('/movie-admin/gallery/upload',[AdminMovieController::class,'uploadGallery'])->name('movie-admin.image.upload');
    Route::get('/movie-admin/gallery/delete/{id}',[AdminMovieController::class,'deleteGallery'])->name('movie-admin.image.destroy');
    Route::resource('genre-admin','App\Http\Controllers\Admin\AdminGenreController');
    Route::resource('user-admin','App\Http\Controllers\Admin\AdminUserController');
    Route::resource('role-admin','App\Http\Controllers\Admin\AdminRolesController');
    Route::resource('link-admin','App\Http\Controllers\Admin\AdminLinkController');
    Route::resource('contact-admin','App\Http\Controllers\Admin\AdminContactController');
    Route::resource('gallery-admin','App\Http\Controllers\Admin\AdminGalleryController');
});



