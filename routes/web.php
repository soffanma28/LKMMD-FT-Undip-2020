<?php
use App\Http\Controllers\LanguageController;
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

Route::group(['middleware' => 'auth'], function(){

	Route::match(['get', 'post'], '/', function(){
		return redirect()->route('peserta.main');
	});
	Route::prefix('peserta')->group(function(){
		Route::match(['get', 'post'], 'main', 'PesertaController@main')->name('peserta.main');
		Route::get('index', 'PesertaController@index')->name('peserta.index');
		Route::match(['get', 'post'], 'calendar', 'PesertaController@calendar')->name('peserta.calendar');
		Route::get('add', 'PesertaController@add')->name('peserta.add');
		Route::post('store', 'PesertaController@store')->name('peserta.store');
		Route::get('{id}/edit', 'PesertaController@edit')->name('peserta.edit');
		Route::get('{id}/view', 'PesertaController@view')->name('peserta.view');
		Route::post('{id}/update', 'PesertaController@update')->name('peserta.update');
		Route::post('{id}/delete', 'PesertaController@delete')->name('peserta.delete');
	});

});

// locale route
Route::get('lang/{locale}',[LanguageController::class, 'swap']);

Route::get('logout', 'Auth\LoginController@logout');
Auth::routes(['register' => false]);

