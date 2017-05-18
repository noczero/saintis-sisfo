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

//dibuat prefix biar sederhana admin/login
Route::prefix('admin')->group(function() {
	Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
});

//dibuat prefix biar sederhana 
Route::prefix('siswa')->group(function() {
	Route::get('/login', 'Auth\SiswaLoginController@showLoginForm')->name('siswa.login'); // untuk login
	Route::post('/login', 'Auth\SiswaLoginController@login')->name('siswa.login.submit');
	Route::get('/', 'SiswaController@index')->name('siswa.dashboard'); // untuk tampilan utama
});

//dibuat prefix biar sederhana 
Route::prefix('guru')->group(function() {
	Route::get('/login', 'Auth\GuruLoginController@showLoginForm')->name('guru.login'); // untuk login
	Route::post('/login', 'Auth\GuruLoginController@login')->name('guru.login.submit');
	Route::get('/', 'GuruController@index')->name('guru.dashboard'); // untuk tampilan utama
});

//dibuat prefix biar sederhana 
Route::prefix('manager')->group(function() {
	Route::get('/login', 'Auth\ManagerLoginController@showLoginForm')->name('manager.login'); // untuk login
	Route::post('/login', 'Auth\ManagerLoginController@login')->name('manager.login.submit');
	Route::get('/', 'ManagerController@index')->name('manager.dashboard'); // untuk tampilan utama
});




