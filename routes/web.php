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
Auth::routes();
Route::get('/', function () {
    return view('home');
});
Route::get('/login', 'Auth\LoginController@showLogin');
Route::post('/login', 'Auth\LoginController@login')->name('login');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/musica', 'MusicaController@index')->name('musica');
Route::get('/daw', 'DAWController@index')->name('daw');
Route::get('/dam', 'DAMController@index')->name('dam');
Route::get('/textos', 'API\TextosController@index')->name('textos');
Route::get('/selector', 'SelectorController@selector')->name('selector');

Route::group(['middleware' => ['auth']], function () {
//Mentre no funcioni el deixarem vuit pero hi va: 
//Selector de cruds

});
