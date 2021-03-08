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

// ADMIN
Route::namespace('Admin')->group(function() {
    //Dashboard
    Route::middleware('role:admin')->get('/admin/dashboard', 'DashboardController@index')->name('admin/dashboard');
    // timeline
    Route::middleware('role:admin')->get('/admin/time-line', 'AdminController@time_line')->name('admin/time-line');
    //tanggapan
    Route::middleware('role:admin')->get('/admin/tanggapan/{id}', 'adminController@tanggapan')->name('admin/tanggapan');
    Route::middleware('role:admin')->post('/admin/tanggapan/kirim', 'adminController@kirim_tanggapan')->name('admin/tanggapan/kirim');
    //aduan
    Route::middleware('role:admin')->get('/admin/data-user', 'AdminController@index')->name('admin/data-user');
    //detail
    Route::middleware('role:admin')->get('/admin/detail-user/{id}', 'AdminController@detail')->name('admin/detail-user');
    Route::middleware('role:admin')->get('/admin/user/{id}/nonaktif', 'AdminController@nonaktif')->name('admin/nonaktif-user');
    //excel export
    Route::middleware('role:admin')->get('/admin/user/export', 'AdminController@export_excel')->name('admin/export-excel');
});

// PETUGAS
Route::namespace('Petugas')->group(function() {
    //Dashboard
    Route::middleware('role:petugas')->get('/petugas/dashboard', 'DashboardController@index')->name('petugas/dashboard');
    //Timeline
    Route::middleware('role:petugas')->get('/petugas/time-line', 'PetugasController@time_line')->name('petugas/time-line');
    //Tanggapan
    Route::middleware('role:petugas')->get('/petugas/tanggapan/{id}', 'PetugasController@tanggapan')->name('petugas/tanggapan');
    Route::middleware('role:petugas')->post('/petugas/tanggapan/kirim', 'PetugasController@kirim_tanggapan')->name('petugas/tanggapan/kirim');
});

// MASYARAKAT
Route::namespace('Masyarakat')->group(function() {
    //Dashboard
    Route::middleware('role:masyarakat')->get('/masyarakat/dashboard', 'DashboardController@index')->name('masyarakat/dashboard');
    //Tulis Pengaduan
    Route::middleware('role:masyarakat')->get('/masyarakat/tulis-aduan', 'MasyarakatController@index')->name('tulis-aduan');
    Route::middleware('role:masyarakat')->post('/masyarakat/tulis-aduan/kirim', 'MasyarakatController@store')->name('tulis-aduan/kirim');
    //Time Line
    Route::middleware('role:masyarakat')->get('/masyarakat/time-line', 'MasyarakatController@time_line')->name('masyarakat/time-line');
    //Edit Profile
    Route::middleware('role:masyarakat')->get('/masyarakat/profile/', 'MasyarakatController@edit')->name('masyarakat/edit');
    Route::middleware('role:masyarakat')->patch('/masyarakat/profile/{user}/kirim', 'MasyarakatController@update')->name('masyarakat/edit/kirim');
});