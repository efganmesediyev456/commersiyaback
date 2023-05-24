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
Route::get('/vacancy/{id}/muracet', 'VacanciesController@muracet')->name('vacancy-front.muraciet');

Route::get('/', 'PageController@home')->name('homepage');



Route::get('/page/{slug}/{slug2?}/{slug3?}/{slug4?}', 'PageController@internalPages');

Route::get('/{type}/{id}/{slug}', 'ArticleController@index')->where(['id' => '[0-9]+'])->name('article');
Route::get('/professions/{id}', 'ProfessionController@index')->where(['id' => '[0-9]+'])->name('profession-front');

Route::get('/position/{position_id}/professions/{id}', 'ProfessionController@show')->where(['position_id' => '[0-9]+','id' => '[0-9]+'])->name('professdsion-front.show');
Route::get('/question/{id}', 'QuestionController@show')->where(['id' => '[0-9]+'])->name('question-front.show');
Route::post('/question/voice', 'QuestionController@voice')->where(['id' => '[0-9]+'])->name('question-front.voice');
Route::get('/vacancy/{id}', 'VacanciesController@show')->where(['id' => '[0-9]+'])->name('vacancy-front.show');




Route::get('search','PageController@search')->name('search') ;


Route::get('/document/{id}', 'SimpleItemsController@document')->name('document-id');





Route::post('/cooperation/e-apply/send','FormApplicationsController@cooperationEApply')->name('cooperation-e-apply');
Route::post('/contact/e-apply/send','FormApplicationsController@contactEApply')->name('contact-e-apply');
Route::post('/volunteers/send','FormApplicationsController@volunteers')->name('volunteers');




Route::post("contact",'FormApplicationsController@contact')->name('contact');
Route::post("/vacancy/apply/{id}",'FormApplicationsController@vacancy')->name('vacancy');
