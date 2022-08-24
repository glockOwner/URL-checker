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


Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'App\Http\Controllers\User', 'prefix' => '/user', 'middleware' => 'checkURL'], function (){
    Route::get('/', 'IndexController')->name('user.index');
    Route::post('/checkUrl', 'CheckController')->name('user.check');
    Route::get('/mychecks', 'MyChecksController')->name('user.checks');
});


Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => '/admin'], function (){
    Route::get('/', 'IndexController')->name('admin.index');
});
