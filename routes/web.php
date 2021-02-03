<?php
use App\Models\berita;
use App\Models\kategori;
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

//tampilan awal
Route::get('/', function () {
    $berita = berita::where('status','on')->orderby('created_at','DESC')->take(3)->get();
    $kategori = kategori::where('status','on')->get();
    return view('berita',['berita' => $berita,'kategori'=> $kategori]);
});

Route::get('/kategori',function(){
 $kategori = kategori::where('status','on')->get();
 return view('layouts/portalberita',compact('kategori'));
});


//auth
Auth::routes(['register'=> false, 'reset'=>false]);

//Account
Route::get('/account','AccountController@account')->name('account');
Route::patch('/account/update/{id}','AccountController@update')->name('updateaccount');

//home
Route::get('/home', 'HomeController@index')->name('home');



//users
Route::get('/Users','UsersController@index')->name('users');
Route::get('formusers','Userscontroller@create')->name('formusers');
Route::post('tambahusers','Userscontroller@tambah')->name('tambahusers');
Route::get('edituser/{id}','Userscontroller@edit')->name('edituser');
Route::get('hapususer/{id}','Userscontroller@hapus')->name('hapususer');
Route::patch('updateuser/{id}','Userscontroller@update')->name('updateuser');
Route::get('cariuser','UsersController@cari')->name('cari_user');


//kategori
Route::get('/kategori','kategoriController@index')->name('kategori');
Route::get('kategori/form','KategoriController@formkategori')->name('formkategori');
Route::post('kategori/tambah','KategoriController@tambah')->name('tambah_kategori');
Route::get('kategori/edit/{id}','KategoriController@edit')->name('editkategori');
Route::get('kategori/hapus/{id}','KategoriController@hapus')->name('hapuskategori');
Route::patch('kategori/update/{id}','KategoriController@update')->name('updatekategori');
Route::get('kategori/cari','KategoriCOntroller@cari')->name('cari');

//berita
Route::get('/berita','BeritaController@index')->name('berita');
Route::get('berita/form','BeritaController@formberita')->name('formberita');
Route::post('berita/tambah','BeritaController@tambah')->name('tambah_berita');
Route::get('berita/edit/{id}','BeritaController@edit')->name('editberita');
Route::get('berita/hapus/{id}','BeritaController@hapus')->name('hapus_berita');
Route::patch('berita/update/{id}','BeritaController@update')->name('update_berita');
Route::get('berita/cari','BeritaCOntroller@cari')->name('cari_berita');
Route::get('berita/detail/{id}','NewsCOntroller@detail')->name('detail_berita');
Route::get('berita/search','NewsController@search')->name('search');
Route::get('berita/kategoridetail/{id}','NewsController@detailkategori')->name('detailkategori');






