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

Route::get('/ha', 'SiteController@home');
Route::get('/','HomeController@index')->name('login');
Route::get('/register','RegisterController@register');
Route::get('/home','DashboardController@index');

Route::get('/register1','SiteController@registerok');
Route::post('/postregister','RegisterController@postregister');
Route::get('/about', 'SiteController@about');

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','LogoutController@logout')->name('logout');
Route::get('/logindosen','DosenController@logindosen');
Route::get('/dosen','DosenController@index');
Route::post('siswa/create','SiswaController@create');
Route::get('siswa/cari','SiswaController@cari');

Route::get('/autocomplete/fetch', 'KelompokController@fetch')->name('autocomplete.fetch');
Route::get('/autocomplete', 'SiswaController@autocomplete')->name('autocomplete');

/*Route::group(['middleware' => ['auth','checkRole:admin']],function(){
	Route::get('/siswa','SiswaController@index');
	Route::get('/siswa/{siswa}/edit','SiswaController@edit');
	Route::post('/siswa/{siswa}/update','SiswaController@update');
	Route::post('siswa/create','SiswaController@create');
	Route::get('/siswa/{siswa}/delete','SiswaController@delete');
	Route::get('/siswa/{siswa}/profile', 'SiswaController@profile');
	Route::post('/siswa/{siswa}/addnilai', 'SiswaController@addnilai');
	Route::get('/siswa/{id}/{idmapel}/deletenilai', 'SiswaController@deletenilai');
	Route::get('/siswa/exportexel', 'SiswaController@exportexel');
	Route::get('/siswa/exportpdf', 'SiswaController@exportpdf');
	Route::get('/posts', 'PostController@index')->name('posts.index');
	Route::get('/posts/{post}/delete','PostController@delete');
	Route::get('/SI','SiswaController@SI');
	Route::get('/TE','SiswaController@TE');
	Route::get('/TI','SiswaController@TI');
	
	Route::get('/matakuliah/{matakuliah}/deletemt', 'MatakuliahController@deletemt');
	Route::post('dosen/createdosen','DosenController@createdosen');
	
	
	Route::get('/editpost/{post}','PostController@edit');
	Route::post('/updatedpost/{post}','PostController@update');
	
	Route::get('post/add',[
	'uses' => 'PostController@add',
	'as' => 'posts.add'

]); 
	 

	 Route::post('posts/create',[
	'uses' => 'PostController@create',
	'as' => 'posts.create'

]); 
	 
});
*/
Route::group(['middleware' => ['auth','checkRole:koordinator,baak,admin']],function(){
	Route::get('/siswa','SiswaController@index');
	Route::get('/siswa/{siswa}/edit','SiswaController@edit');
	Route::post('/siswa/{siswa}/update','SiswaController@update');
	Route::post('siswa/create','SiswaController@create');
	Route::get('/siswa/{siswa}/delete','SiswaController@delete');
	Route::get('/siswa/{siswa}/profile', 'SiswaController@profile');
	Route::post('/siswa/{siswa}/addnilai', 'SiswaController@addnilai');
	Route::get('/siswa/{id}/{idmapel}/deletenilai', 'SiswaController@deletenilai');
	Route::get('/siswa/exportexel', 'SiswaController@exportexel');
	Route::get('/siswa/exportpdf', 'SiswaController@exportpdf');
	Route::get('/posts', 'PostController@index')->name('posts.index');
	Route::get('/posts/{post}/delete','PostController@delete');
	Route::get('/SI','SiswaController@SI');
	Route::get('/TE','SiswaController@TE');
	Route::get('/TI','SiswaController@TI');
	
	Route::get('/matakuliah/{matakuliah}/deletemt', 'MatakuliahController@deletemt');
	Route::post('dosen/createdosen','DosenController@createdosen');
	
	Route::post('/kelompokMahasiswa/alokasi','KelompokController@alokasi');
	
	Route::get('/editpost/{post}','PostController@edit');
	Route::post('/updatedpost/{post}','PostController@update');

	
	Route::get('post/add',[
	'uses' => 'PostController@add',
	'as' => 'posts.add'

]);


	 

	 Route::post('posts/create',[
	'uses' => 'PostController@create',
	'as' => 'posts.create'

]); 
	 
});

	
Route::group(['middleware' => ['auth','checkRole:siswa']],function(){
	Route::get('/profilsaya','SiswaController@profilsaya');
	Route::get('/files/create','DocumentController@create');
	Route::get('/kelompok','KelompokController@kelompok');
	Route::post('/kelompok/create','KelompokController@tambahKelompok');


});
	
Route::group(['middleware' => ['auth','checkRole:admin,siswa,koordinator,dospen,dosenpenguji,baak']],function(){
	Route::get('/forum','ForumController@index');
	Route::post('/forum/create','ForumController@create');
	Route::get('/forum/{forum}/view','ForumController@view')->name('forum.view');
	Route::post('/komentar/created/{forum}','ForumController@created');
	Route::get('/komentar/{komentar}/deletekm','ForumController@deletekm');
	Route::post('/komentar/{komentar}/updatekm','ForumController@updatekm');
	Route::get('/komentar/{komentar}/editkm','ForumController@editkm');
	Route::get('/dosen/{dosen}/profile', 'DosenController@profile'); 
	Route::get('/history/{id}','KelompokController@hapusHistory');
	Route::post('/form/create','KelompokController@formcreate');
	Route::get('/form','KelompokController@form');
	Route::get('/hapusform/{id}','KelompokController@hapusform');
	Route::get('/matakuliah','MatakuliahController@index');
	Route::get('/komentar/{forum}/deletefrm','ForumController@deletefrm');
	Route::get('/files','DocumentController@index');
	Route::post('/files','DocumentController@store');
	Route::get('/files/{id}','DocumentController@show');
	Route::get('/files/download/{file}','DocumentController@download');	
	Route::get('/document/{document}/hapus','DocumentController@destroy');	
	Route::get('/files/edit/{document}','DocumentController@edit');
	Route::post('/files/update/{document}','DocumentController@update');
	Route::get('/history','KelompokController@history');
	Route::get('/changepass','SiteController@changepass');
	Route::post('/changepassword','SiteController@changepassword');
	Route::get('/kelompok/{id}','KelompokController@hapusKelompok');
	Route::get('/kelompok/{id}/hapus','KelompokController@hapusKelompok');
	Route::get('/kelompok/{id}/editKelompok','KelompokController@editKelompok');
	Route::post('/kelompok/{id}/update','KelompokController@update');
	Route::get('/jadwal','KelompokController@jadwal');
	Route::post('/jadwal/create','KelompokController@tambahjadwal');
	Route::get('/hapusjadwal/{id}','KelompokController@hapusjadwal');
	Route::get('/jadwaledit/{jadwal}','KelompokController@jadwaledit');
	Route::post('/updatejadwal/{jadwal}','KelompokController@updatejadwal');

});
Route::group(['middleware' => ['auth','checkRole:admin,siswa,dospen,dosenpenguji,koordinator']],function(){
	Route::get('/siswa','SiswaController@index');
	Route::get('/siswa/{siswa}/edit','SiswaController@edit');
	Route::post('/siswa/{siswa}/update','SiswaController@update');
	Route::post('siswa/create','SiswaController@create');
	Route::get('/siswa/{siswa}/delete','SiswaController@delete');
	Route::get('/siswa/{siswa}/profile', 'SiswaController@profile');
	Route::post('/siswa/{siswa}/addnilai', 'SiswaController@addnilai');
	Route::get('/siswa/{id}/{idmapel}/deletenilai', 'SiswaController@deletenilai');
	Route::get('/siswa/exportexel', 'SiswaController@exportexel');
	Route::get('/siswa/exportpdf', 'SiswaController@exportpdf');
	Route::get('/posts', 'PostController@index')->name('posts.index');
	Route::get('/posts/{post}/delete','PostController@delete');
	Route::get('/SI','SiswaController@SI');
	Route::get('/TE','SiswaController@TE');
	Route::get('/TI','SiswaController@TI');
	Route::post('/kelompokMahasiswa/alokasi','KelompokController@alokasi');
	Route::get('/kelompokMahasiswa','KelompokController@indexKelompok');
	

});
/*Route::group(['middleware' => ['dosen']], function() {
  	Route::get('/dashboard','DashboardController@index');
});*/
Route::group(['middleware' => ['auth','checkRole:admin,koordinator,dospen,dosenpenguji']],function(){
Route::post('/kelompokMahasiswa/alokasi','KelompokController@alokasi');
Route::get('/kelompokMahasiswa','KelompokController@indexKelompok');
Route::get('/konfirmasi','KelompokController@konfirmasi');
Route::get('/konfirmasijadwal','KelompokController@konfirmasijadwal');
Route::get('/konfirmasijadwal1','KelompokController@konfirmasijadwal1');
});


Route::get('/{slug}',[
	'uses' => 'SiteController@singlepost',
	'as' => 'site.single.post'

]); 