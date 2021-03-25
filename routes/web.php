<?php

use Illuminate\Support\Facades\Auth;
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


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'LandingPageController@index');

Auth::routes(['verify' => true]);
Route::get('home', 'HomeController@index')->name('home');

Route::namespace('Auth')->group(function() {
    Route::middleware('verified')->get('verify', 'VerificationController@index');
});

// Google Auth
Route::get('login/google', 'Auth\SocialiteController@redirectToGoogle')->name('google.login');
Route::get('callback/google', 'Auth\SocialiteController@handleGoogleCallback')->name('google.callback');

// ADMIN
Route::namespace('Admin')->group(function() {
    // dashboard
    Route::middleware('role:admin')->get('/admin/dashboard', 'DashboardController@index')->name('admin/dashboard');
    // profile
    Route::middleware('role:admin')->get('/admin/profile', 'AdminController@profile')->name('admin/profile');
    Route::middleware('role:admin')->patch('/admin/profile/update', 'AdminController@update')->name('admin/profile/update');
    // timeline
    Route::middleware('role:admin')->get('/admin/time-line', 'AdminController@time_line')->name('admin/time-line');
    // verifikasi
    Route::middleware('role:admin')->get('/admin/verifikasi/', 'AuthController@verifikasi')->name('admin/verifikasi');
    Route::middleware('role:admin')->get('/admin/verifikasi/', 'AuthController@verifikasi')->name('admin/verifikasi');
    Route::middleware('role:admin')->get('/admin/detail-verifikasi/{id}', 'AuthController@detail_verif')->name('admin/detail-verifikasi');
    Route::middleware('role:admin')->delete('/admin/verifikasi/{id}', 'AuthController@tolak')->name('admin/verifikasi/tolak');
    Route::middleware('role:admin')->get('/admin/verifikasi/{id}', 'AuthController@terima')->name('admin/verifikasi/terima');
    Route::middleware('role:admin')->get('/admin/verifikasi/sort-by-created', 'AuthController@short_by_created')->name('admin/verifikasi/sort-by-created');
    //tanggapan
    Route::middleware('role:admin')->get('/admin/tanggapan/{id}', 'AdminController@tanggapan')->name('admin/tanggapan');
    Route::middleware('role:admin')->post('/admin/tanggapan/kirim', 'AdminController@kirim_tanggapan')->name('admin/tanggapan/kirim');
    //petugas management
    Route::middleware('role:admin')->get('/admin/petugas', 'AdminController@petugas')->name('admin/petugas');
    Route::middleware('role:admin')->post('/admin/petugas/tambah', 'AdminController@petugas_tambah')->name('admin/petugas/tambah');
    //data pengaduan
    Route::middleware('role:admin')->get('/admin/pengaduan', 'AdminController@pengaduan')->name('admin/pengaduan');
    Route::middleware('role:admin')->get('/admin/detail-aduan/{id}', 'AdminController@detail_aduan')->name('admin/detail-aduan');
    Route::middleware('role:admin')->get('/admin/cetak-aduan-pertanggal/{tglAwal}/{tglAkhir}', 'AdminController@cetak_aduan_pertanggal')->name('admin/cetak-aduan-pertanggal');
    Route::middleware('role:admin')->get('/admin/cetak-aduan-lokasi/{lokasi}', 'AdminController@cetak_aduan_lokasi')->name('admin/cetak-aduan-lokasi');
    //user
    Route::middleware('role:admin')->get('/admin/data-user', 'AdminController@index')->name('admin/data-user');
    Route::middleware('role:admin')->get('/admin/detail-user/{id}', 'AdminController@detail')->name('admin/detail-user');
    Route::middleware('role:admin')->delete('/admin/user/{id}/nonaktif', 'AdminController@nonaktif')->name('admin/nonaktif-user');
    Route::middleware('role:admin')->get('/admin/user/{id}/aktifkan', 'AdminController@aktifkan')->name('admin/aktifkan-user');
    Route::middleware('role:admin')->post('/admin/search', 'AdminController@search')->name('admin/search');
    //excel export
    Route::middleware('role:admin')->get('/admin/user/export', 'AdminController@user_excel')->name('admin/user-export');
    Route::middleware('role:admin')->get('/admin/pengaduan/export', 'AdminController@pengaduan_excel')->name('admin/pengaduan-export');
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
    // verifikasi
    Route::middleware('role:petugas')->get('/petugas/verifikasi/', 'AuthController@verifikasi')->name('petugas/verifikasi');
    Route::middleware('role:petugas')->get('/petugas/detail-verifikasi/{id}', 'AuthController@detail_verif')->name('petugas/detail-verifikasi');
    Route::middleware('role:petugas')->delete('/petugas/verifikasi/{id}', 'AuthController@tolak')->name('petugas/verifikasi/tolak');
    Route::middleware('role:petugas')->get('/petugas/verifikasi/{id}', 'AuthController@terima')->name('petugas/verifikasi/terima');
    //user
    Route::middleware('role:petugas')->get('/petugas/data-user', 'PetugasController@index')->name('petugas/data-user');
    Route::middleware('role:petugas')->get('/petugas/detail-user/{id}', 'PetugasController@detail')->name('petugas/detail-user');
    Route::middleware('role:petugas')->delete('/petugas/user/{id}/nonaktif', 'PetugasController@nonaktif')->name('petugas/nonaktif-user');
    Route::middleware('role:petugas')->get('/petugas/user/{id}/aktifkan', 'PetugasController@aktifkan')->name('petugas/aktifkan-user');
});

// MASYARAKAT
Route::namespace('Masyarakat')->group(function() {
    //Dashboard
    Route::middleware('role:masyarakat')->get('/masyarakat/dashboard', 'DashboardController@index')->name('masyarakat/dashboard');
    //Pengaduan
    Route::middleware('role:masyarakat')->get('/masyarakat/tulis-aduan', 'MasyarakatController@index')->name('tulis-aduan');
    Route::middleware('role:masyarakat')->post('/masyarakat/tulis-aduan/kirim', 'MasyarakatController@store')->name('tulis-aduan/kirim');
    Route::middleware('role:masyarakat')->delete('/masyarakat/aduan/hapus/{id}', 'MasyarakatController@hapus_aduan')->name('aduan/hapus');
    Route::middleware('role:masyarakat')->get('/masyarakat/aduan/edit/{id}', 'MasyarakatController@edit')->name('aduan/edit');
    Route::middleware('role:masyarakat')->patch('/masyarakat/aduan/edit/{id}/kirim', 'MasyarakatController@edit_kirim')->name('aduan/edit/kirim');
    // Tanggapan
    Route::middleware('role:masyarakat')->get('/masyarakat/tanggapan/{id}', 'MasyarakatController@tanggapan')->name('masyarakat/tanggapan');
    //Time Line
    Route::middleware('role:masyarakat')->get('/masyarakat/time-line', 'MasyarakatController@time_line')->name('masyarakat/time-line');
    //Edit Profile
    Route::middleware('role:masyarakat')->get('/masyarakat/profile/', 'MasyarakatController@profile')->name('masyarakat/profile');
    Route::middleware('role:masyarakat')->patch('/masyarakat/profile/kirim', 'MasyarakatController@update')->name('masyarakat/profile/kirim');
});