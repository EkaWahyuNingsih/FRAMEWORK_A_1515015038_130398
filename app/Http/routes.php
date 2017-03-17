<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and gives it the controller to call when that URI is requested.
|
*/
Route::get('/', function(){
	return view('welcome');
});
Route::get('pengguna','PenggunaController@awal');
Route::get('pengguna/tambah', 'PenggunaController@tambah');
Route::get('pengguna/simpan', 'PenggunaController@simpan');

Route::get('ruangan','RuanganController@awal');
Route::get('ruangan/tambah', 'RuanganController@tambah');

Route::get('matakuliah','MatakuliahController@awal');
Route::get('matakuliah/tambah', 'MatakuliahController@tambah');

Route::get('dosen','DosenController@awal');
Route::get('dosen/tambah', 'DosenController@tambah');

Route::get('mahasiswa','MahasiswaController@awal');
Route::get('mahasiswa/tambah','MahasiswaController@tambah');

Route::get('dosen_matakuliah','Dosen_MatakuliahController@awal');
Route::get('dosen_matakuliah/tambah','Dosen_MatakuliahController@tambah');

Route::get('jadwal_matakuliah','Jadwal_MatakuliahController@awal');
Route::get('jadwal_matakuliah/tambah','Jadwal_MatakuliahController@tambah');

Route::get('pengguna/{pengguna}',function ($pengguna)
{
	return " Hallo World dari pengguna $pengguna";
});

//sRoute::auth();

//Route::get('/home', 'HomeController@index');
