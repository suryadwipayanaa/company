<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardBlogController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\FullCourseController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\HariController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JamController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SayController;
use App\Http\Controllers\ShowBranchController;
use App\Http\Controllers\ShowCategoryController;
use App\Http\Controllers\ShowDashboardController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[HomeController::class, 'index']);
Route::get('/detailPromo/{slug:slug}',[HomeController::class, 'show']);
Route::get('/detailcourse/{detail:slug}',[HomeController::class, 'showCourse']);
Route::get('/category',[ShowCategoryController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('/auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);
Route::get('/blogs',[BlogController::class , 'index']);
Route::get('/blogs/{slug:slug}',[BlogController::class , 'sigle']);
Route::get('/blog/{slug:slug}',[BlogController::class , 'show']);
Route::get('/contact',[ShowBranchController::class, 'show']);
Route::get('/dashboard',[ShowDashboardController::class , 'index']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'store']);
Route::get('/register', [RegisterController::class, 'index'])->name('login')->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::resource('/course', FullCourseController::class);
Route::resource('/dashboard/blogs', DashboardBlogController::class);
Route::resource('/dashboard/promo', PromoController::class);
Route::resource('/dashboard/branch', BranchController::class);
Route::resource('/dashboard/course', CourseController::class);
Route::resource('/dashboard/teams', TeamController::class);
Route::resource('/dashboard/say', SayController::class);
Route::resource('/dashboard/komentar', KomentarController::class);
Route::resource('/dashboard/category', CategoryController::class);
