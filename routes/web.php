<?php

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

Route::get('/', 'App\Http\Controllers\HomeController@home')->name('home');
/* ROUTES FOR AUTHENTICATION */
Route::get('/login','App\Http\Controllers\PageController@login');
Route::get('/register','App\Http\Controllers\PageController@register');
Route::post('/register', 'App\Http\Controllers\AuthController@doRegister');
Route::post('/login','App\Http\Controllers\AuthController@doLogin');
/* ROUTE FOR LOGOUT */
Route::get('/logout', 'App\Http\Controllers\AuthController@logout');

Route::get("/single/{id}","App\Http\Controllers\HomeController@singlePage")->name('single');

/* ROUTES FOR LOGGED IN USER */
Route::group(['middleware' => 'isLoggedIn'],function (){
    Route::get('/create','App\Http\Controllers\BlogController@index')->name('index');
    Route::post('/addBlog','App\Http\Controllers\BlogController@store');
    Route::get('/deleteMyBlog/{id}','App\Http\Controllers\BlogController@destroy');
    Route::get('/update/{id}','App\Http\Controllers\BlogController@show');
    Route::post('/update/blog','App\Http\Controllers\BlogController@update');
});

/* ROUTES FOR ADMIN */
Route::group(['middleware' => 'AdminMiddleware'],function (){
    Route::get('/admin','App\Http\Controllers\Admin\AdminController@index');
    Route::get('/deleteBlog/{id}','App\Http\Controllers\Admin\AdminController@destroyBlog');
    Route::get('/allowedBlog/{id}','App\Http\Controllers\Admin\AdminController@updateBlog');
    Route::get('/deleteNotAllowed/{id}', 'App\Http\Controllers\Admin\AdminController@deleteNotAllowedBlog');
});

