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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index');

Route::get('/test', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Registrasi Siswa
Route::get('/siswa/registrasi', 'RegistrasiSiswa@create')->name('registrasi.siswa');
Route::post('/siswa/store', 'RegistrasiSiswa@store')->name('registrasi.store.siswa');

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

Route::prefix('manage-guru')->group(function() {
	//CRUD
	Route::get('/', 'ManageGuruController@manage');
	Route::get('/create', 'ManageGuruController@create');
	Route::post('/store', 'ManageGuruController@store');
	Route::get('/show/{id}', 'ManageGuruController@show');
	Route::post('/update/{id}', 'ManageGuruController@update');
	Route::delete('/destroy/{id}', 'ManageGuruController@destroy');
});

Route::prefix('manage-siswa')->group(function() {
	Route::get('/', 'ManageSiswaController@index');
	Route::get('/create', 'ManageSiswaController@create');
	Route::post('/store', 'ManageSiswaController@store');
	Route::get('/show/{id}', 'ManageSiswaController@show');
	Route::post('/update/{id}', 'ManageSiswaController@update');
	Route::delete('/destroy/{id}', 'ManageSiswaController@destroy');
});

//dibuat prefix biar sederhana 
Route::prefix('manager')->group(function() {
	Route::get('/login', 'Auth\ManagerLoginController@showLoginForm')->name('manager.login'); // untuk login
	Route::post('/login', 'Auth\ManagerLoginController@login')->name('manager.login.submit');
	Route::get('/', 'ManagerController@index')->name('manager.dashboard'); // untuk tampilan utama
});

// CRUD untuk kelas
Route::group(['prefix' => 'kelas'], function(){
	Route::get('/', 'KelasController@index');
	Route::get('/create', 'KelasController@create');
	Route::post('/store', 'KelasController@store');
	Route::get('/show/{id}', 'KelasController@show');
	Route::post('/update/{id}', 'KelasController@update');
	Route::delete('/destroy/{id}', 'KelasController@destroy');
});


Route::get('profile-manager/{id}' , 'ManagerController@show');
Route::post('profile-manager/update/{id}' , 'ManagerController@update');

Route::get('profile-siswa/{id}' , 'SiswaController@show');
Route::post('profile-siswa/update/{id}' , 'SiswaController@update');

Route::get('profile-admin/{id}' , 'AdminController@show');
Route::post('profile-admin/update/{id}' , 'AdminController@update');

Route::get('profile-guru/{id}' , 'GuruController@show');
Route::post('profile-guru/update/{id}' , 'GuruController@update');


Route::prefix('absensi-kelas')->group(function() {
	Route::get('/{id}', 'AbsensiController@index');
	Route::get('/create', 'AbsensiController@create');
	Route::post('/store', 'AbsensiController@store');
	Route::get('/show/{id}', 'AbsensiController@show');
	Route::post('/update/{id}', 'AbsensiController@update');
	Route::delete('/destroy/{id}', 'AbsensiController@destroy');
});


Route::prefix('upload-materi')->group(function() {
	Route::get('/' , 'UploadMateriController@index');
	Route::get('/{id}' , 'UploadMateriController@create');
	Route::post('/upload' , 'UploadMateriController@upload')->name('upload.submit');
});