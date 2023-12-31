<?php


use App\Http\Controllers\FrontendController;

use App\Http\Controllers\AccountController;

use App\Http\Controllers\LocationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Models\location;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;


use App\Models\Contact;
use App\Http\Controllers\ContactController;

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
// Auth::routes();
Route::get('/home','HomeController@index')->name('home');
// Route::get('/','FrontendController@home')->name('website');

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/home', [FrontendController::class, 'home'])->name('website.home');
Route::get('/', [FrontendController::class, 'home'])->name('website');

Route::get('/all_post', [FrontendController::class, 'all_post'])->name('website.all_post');

Route::get('/contact',[FrontendController::class, 'contact'])->name('website.contact');

Route::get('/about',[FrontendController::class, 'about'])->name('website.about');

Route::get('/post/{id}',[FrontendController::class, 'post'])->name('website.post');

// Route::get('/test', function()
// {
//     return view('layouts.admin');
// });

// Route::post('/contact', 'FrontendController@send_message') ->name('website.contact');
Route::post('/contact', [FrontendController::class, 'send_message'])->name('website.contact');




Route::prefix('/admin')->namespace('App\Http\Controllers')->group(function(){
    
    Route::match(['get','post'],'login','AccountController@login');
    Route::group(['middleware'=>['account']], function(){
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
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
   // Contact
    // Route::get('/contact','ContactController@index')->name('contact.index');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/show/{id}', [ContactController::class, 'show'])->name('contact.show');
    Route::delete('/contact/delete/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

    });
   Route::get('/search', function()
    {
        return view('website.search');

    });
    Route::get('/search', [FrontendController::class, 'search'])->name('search.result');
        
});
    









    



