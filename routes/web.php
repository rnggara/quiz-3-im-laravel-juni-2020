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
    return view('index');
});

Route::get('/articles/create', 'ArticlesController@create'); // menampilkan halaman form
Route::post('/articles', 'ArticlesController@save'); // menyimpan data
Route::get('/articles', 'ArticlesController@index'); // menampilkan semua
Route::get('/articles/{id}', 'ArticlesController@show'); // menampilkan detail item dengan id
Route::get('/articles/{id}/edit', 'ArticlesController@edit'); // menampilkan form untuk edit item
Route::put('/articles/{id}', 'ArticlesController@update'); // menyimpan perubahan dari form edit
Route::delete('/articles/{id}', 'ArticlesController@delete'); // menghapus data dengan id
