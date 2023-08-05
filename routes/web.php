<?php

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
});
Route::get('/post', function()
{
    return view('website.post');
});

Route::get('/test', function()
{
    return view('layouts.admin');
});

Route::get('/test', function()
{
    return view('admin.dashboard.index');
});