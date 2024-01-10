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

Route::get('/about', [AboutController::class, 'index'])->name('web.about');

Route::get('/blog', [BlogController::class, 'index'])->name('web.blog');

Route::get('/contact', [ContactController::class, 'index'])->name('web.contact');

Route::get('/service', [ServiceController::class, 'index'])->name('web.service');

Route::get('/team', [TeamController::class, 'index'])->name('web.team');

Route::get('/testimonial', [TestimonialController::class, 'index'])->name('web.testimonial');

Route::get('/our-feature', [OurFeatureController::class, 'index'])->name('web.our_feature');

Route::get('/free-qoute', [FreeQouteController::class, 'index'])->name('web.free_qoute');