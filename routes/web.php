<?php

use App\Http\Controllers\LocationController;
use App\Http\Controllers\TagController;
use App\Models\location;
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
    return view('home');
});

Route::get('/about', function()
{
    return view('website.about');
});

Route::get('/category', function()
{
    return view('website.category');
});
Route::get('/contact', function()
{
    return view('website.contact');
});
Route::get('/home', function()
{
    return view('website.home');
})->name('website');
Route::get('/post', function()
{
    return view('website.post');
});

Route::get('/test', function()
{
    return view('layouts.admin');
});




// Admin panel:
Route::group(['prefix' => 'admin'],function()
{
    Route::get('/dashboard', function()
    {
        return view('admin.dashboard.index');
    });
    Route::resource('location', LocationController::class);
    // route::resource('location','LocationController');
    Route::resource('Tag',TagController::class);
}
);