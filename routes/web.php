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

Route::resource('/vacancies', 'VacancyController');
Route::resource('/candidates', 'CandidateController');

Route::get('/create_album','PhotoController@view_create_photos')->name('view_create_photos');
Route::get('/steptwo_empresa','CompanyController@steptwo');
Route::get('/steptwo_candidato','CandidateController@steptwo');
Route::get('/download_portifolio','CandidateController@download_photo')->name('downloadportifolio');

Route::post('/insert_new_photo','PhotoController@upload_photo')->name('insert_new_photo');
Route::post('/delete_photo','PhotoController@delete_photo')->name('delete_photo');

Route::post('/update_steptwo_candidato','CandidateController@update')->name('update_steptwo_candidato');
Route::post('/update_steptwo_empresa','CompanyController@update')->name('update_steptwo_empresa');

Route::get('/my_vacancies','CompanyController@minhasvagas')->name('my_vacancies');
Route::get('/new_vacancies','CompanyController@novavaga')->name('new_vacancies');

Route::post('/create_vacancies','CompanyController@createvaga')->name('create_vacancies');
Route::post('/delete_vacancies','CompanyController@deletevaga')->name('delete_vacancies');
Route::post('/view_update_vacancies','CompanyController@view_update_vacancy')->name('view_update_vacancy');
Route::post('/update_vacancies','CompanyController@updatevaga')->name('update_vacancies');


