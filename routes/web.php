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


Route::get('/register1','SiteController@registerok');
Route::post('/postregister','RegisterController@postregister');
Route::get('/about', 'SiteController@about');
Route::get('/home','DashboardController@index');

Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','LogoutController@logout')->name('logout');
Route::get('/logindosen','DosenController@logindosen');
Route::post('/logind','DosenController@logind');
Route::post('siswa/create','SiswaController@create');
Route::get('siswa/cari','SiswaController@cari');


Route::group(['middleware' => ['auth','checkRole:admin']],function(){
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
	Route::get('/guru/{id}/profile', 'GuruController@profile'); 
	Route::get('/posts', 'PostController@index')->name('posts.index');
	Route::get('/posts/{post}/delete','PostController@delete');
	Route::get('/SI','SiswaController@SI');
	Route::get('/TE','SiswaController@TE');
	Route::get('/TI','SiswaController@TI');
	 
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
	
});
	
Route::group(['middleware' => ['auth','checkRole:siswa,admin']],function(){
		Route::get('/siswa/{siswa}/edit','SiswaController@edit');
	Route::post('/siswa/{siswa}/update','SiswaController@update');
});
/*Route::group(['middleware' => ['dosen']], function() {
  	Route::get('/dashboard','DashboardController@index');
});*/


Route::get('/{slug}',[
	'uses' => 'SiteController@singlepost',
	'as' => 'site.single.post'

]); 