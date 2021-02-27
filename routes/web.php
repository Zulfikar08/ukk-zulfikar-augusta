<?php

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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->group(function() {
    Route::middleware('role:admin')->get('/admin/dashboard', 'DashboardController@index')->name('admin/dashboard');
});
Route::namespace('Petugas')->group(function() {
    Route::middleware('role:petugas')->get('/petugas/dashboard', 'DashboardController@index')->name('petugas/dashboard');
});
Route::namespace('Masyarakat')->group(function() {
    Route::middleware('role:masyarakat')->get('/masyarakat/dashboard', 'DashboardController@index')->name('masyarakat/dashboard');
});