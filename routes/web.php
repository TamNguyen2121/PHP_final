<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\location;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Models\Contact;

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

// Route::post('/contact', 'FrontendController@send_message') ->name('website.contact');
Route::post('/contact', [FrontendController::class, 'send_message'])->name('website.contact');

// Admin panel:
Route::prefix('/admin')->namespace('App\Http\Controllers')->group(function(){
    
    Route::match(['get','post'],'login','AccountController@login');
    Route::group(['middleware'=>['account']], function(){
        Route::get('dashboard','AccountController@dashboard');
        Route::match(['get','post'],'profile','AccountController@profile');
        Route::match(['get','post'],'edituser','AccountController@edituser');
        Route::resource('location', LocationController::class);
        Route::resource('Tag',TagController::class);
        Route::resource('post',PostController::class );
        
        Route::get('logout','AccountController@logout');

        Route::get('user','AccountController@subadmins');
        Route::post('update-subadmin-status','AccountController@updateSubadminStatus');
        Route::match(['get','post'],'add-edit-subadmin/{id?}','AccountController@addEditSubadmin');
        Route::get('delete-subadmin/{id?}','AccountController@deleteSubadmin');


        
    });
        
});
    








// Route::group(['prefix' => 'admin'],function()
// {
//     Route::get('/dashboard', function()
//     {
//         return view('admin.dashboard.index');
//     });
//     Route::resource('location', LocationController::class);
//     // route::resource('location','LocationController');
//     Route::resource('Tag',TagController::class);
//     Route::resource('post',PostController::class );

    
// } 
// );