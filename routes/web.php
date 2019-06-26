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

route::get('/dashboard','HomeController@index')->name('dashboard');

Route::resource('/vagas', 'VagasController');
Route::resource('/candidatos', 'CandidatoController');

Route::get('/steptwo_empresa','EmpresaController@steptwo');
Route::get('/steptwo_candidato','CandidatoController@steptwo');
Route::get('/download_portifolio','CandidatoController@download_photo')->name('downloadportifolio');

Route::post('/update_steptwo_candidato','CandidatoController@update')->name('update_steptwo_candidato');
Route::post('/update_steptwo_empresa','EmpresaController@update')->name('update_steptwo_empresa');

Route::get('/minhas_vagas','EmpresaController@minhasvagas')->name('minhasvagas');
Route::get('/nova_vaga','EmpresaController@novavaga')->name('novavaga');
Route::post('/create_vaga','EmpresaController@createvaga')->name('createvaga');
Route::post('/delete_vaga','EmpresaController@deletevaga')->name('deletevaga');
Route::post('/viewupdate_vaga','EmpresaController@viewupdatevaga')->name('viewupdatevaga');
Route::post('/updatevaga','EmpresaController@updatevaga')->name('updatevaga');


