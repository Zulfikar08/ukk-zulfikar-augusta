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
Route::get('home', 'HomeController@index')->name('home');

Route::namespace('Admin')->group(function() {
    //Dashboard
    Route::middleware('role:admin')->get('/admin/dashboard', 'DashboardController@index')->name('admin/dashboard');
    //aduan
    Route::middleware('role:admin')->get('/admin/data-user', 'AdminController@index')->name('admin/data-user');
    //detail
    Route::middleware('role:admin')->get('/admin/detail-user/{id}', 'AdminController@detail')->name('admin/detail-user');
    Route::middleware('role:admin')->get('/admin/user/{id}/nonaktif', 'AdminController@detail')->name('admin/nonaktif-user');
    //pdf export
    Route::middleware('role:admin')->get('/admin/user/export/{id}', 'AdminController@pdf_export')->name('admin/export-pdf');
});
Route::namespace('Petugas')->group(function() {
    Route::middleware('role:petugas')->get('/petugas/dashboard', 'DashboardController@index')->name('petugas/dashboard');
});
Route::namespace('Masyarakat')->group(function() {
    //Dashboard
    Route::middleware('role:masyarakat')->get('/masyarakat/dashboard', 'DashboardController@index')->name('masyarakat/dashboard');
    //Time Line
    Route::middleware('role:masyarakat')->get('/masyarakat/time-line', 'MasyarakatController@time_line')->name('masyarakat/time-line');
    //Tulis Pengaduan
    Route::middleware('role:masyarakat')->get('/masyarakat/tulis-aduan', 'MasyarakatController@index')->name('tulis-aduan');
    Route::middleware('role:masyarakat')->post('/masyarakat/tulis-aduan/kirim', 'MasyarakatController@store')->name('tulis-aduan/kirim');
});