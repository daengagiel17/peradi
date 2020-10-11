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

// Auth
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
// Auth Provider
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

// Dashboard
Route::get('/admin', 'DashboardController@index')->name('dashboard');
Route::get('activity', 'DashboardController@activity')->name('activity.index');

Route::get('profile', 'ProfileController@show')->name('profile.show');
Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::put('profile/edit', 'ProfileController@update')->name('profile.update');

// Anggota
Route::resource('anggota', 'AnggotaController');
Route::get('impor-anggota', 'AnggotaController@uploadAnggota');
Route::post('impor-anggota', 'AnggotaController@imporAnggota')->name('impor.anggota');

// Search
Route::get('/privacy', 'HomeController@privacy');
Route::get('/', 'HomeController@home')->name('home');
Route::get('/data/{id}', 'HomeController@show')->name('show');
Route::get('/data', 'HomeController@index')->name('index');
Route::post('/search-nama', 'HomeController@searchByNama')->name('search.nama');
Route::post('/search-kecamatan', 'HomeController@searchByKecamatan')->name('search.kecamatan');