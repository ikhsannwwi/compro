<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\front\BlogController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\TeamController;
use App\Http\Controllers\front\AboutController;
use App\Http\Controllers\front\ContactController;
use App\Http\Controllers\front\ServiceController;
use App\Http\Controllers\front\FreeQouteController;
use App\Http\Controllers\front\OurFeatureController;
use App\Http\Controllers\front\TestimonialController;


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

// Route::get('/ms-admin-ikhsannawawi', function () {
//     Artisan::call('migrate:fresh --seed');
//     return redirect()->route('index');
// });
Route::get('/', [HomeController::class, 'index'])->name('web.index');
Route::get('/getBanner', [HomeController::class, 'getBanner'])->name('web.getBanner');
Route::get('/getContact', [HomeController::class, 'getContact'])->name('web.getContact');
Route::get('/getAbout', [HomeController::class, 'getAbout'])->name('web.getAbout');
Route::get('/getOurFeature', [HomeController::class, 'getOurFeature'])->name('web.getOurFeature');
Route::get('/getService', [HomeController::class, 'getService'])->name('web.getService');
Route::get('/getFreeQoute', [HomeController::class, 'getFreeQoute'])->name('web.getFreeQoute');
Route::get('/getTestimonial', [HomeController::class, 'getTestimonial'])->name('web.getTestimonial');
Route::get('/getBlog', [HomeController::class, 'getBlog'])->name('web.getBlog');
Route::get('/getClient', [HomeController::class, 'getClient'])->name('web.getClient');
Route::get('/getTeam', [HomeController::class, 'getTeam'])->name('web.getTeam');
Route::get('/serverside/count', [HomeController::class, 'count'])->name('web.serverside.count');

Route::get('/about', [AboutController::class, 'index'])->name('web.about');

Route::get('/blog', [BlogController::class, 'index'])->name('web.blog');
Route::get('/blog/fetchData', [BlogController::class, 'fetchData'])->name('web.blog.fetchData');
Route::get('/blog/kategori/{slug}', [BlogController::class, 'kategori'])->name('web.blog.kategori');
Route::get('/blog/{slug}', [BlogController::class, 'slug'])->name('web.blog.slug');
Route::post('/blog/{slug}/comment', [BlogController::class, 'comment'])->name('web.blog.slug.comment');
Route::post('/blog/{slug}/comment/reply', [BlogController::class, 'reply'])->name('web.blog.slug.comment.reply');
Route::get('/blog/fetchData/comment', [BlogController::class, 'fetchDataComment'])->name('web.blog.fetchData.comment');

Route::get('/contact', [ContactController::class, 'index'])->name('web.contact');
Route::post('/contact/serverside/sendMessage', [ContactController::class, 'sendMessage'])->name('web.contact.serverside.sendMessage');

Route::get('/service', [ServiceController::class, 'index'])->name('web.service');

Route::get('/team', [TeamController::class, 'index'])->name('web.team');

Route::get('/testimonial', [TestimonialController::class, 'index'])->name('web.testimonial');

Route::get('/our-feature', [OurFeatureController::class, 'index'])->name('web.our_feature');

Route::get('/free-qoute', [FreeQouteController::class, 'index'])->name('web.free_qoute');
Route::post('/free-qoute/serverside/sendMessage', [FreeQouteController::class, 'sendMessage'])->name('web.free_qoute.serverside.sendMessage');