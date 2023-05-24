<?php


use Illuminate\Support\Facades\Auth;
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


Route::get('/clear-cache', 'Atom\ExtraController@clear_cache')->name('cache.clear');

Route::group(['middleware'=> ['auth:admin','role']], function () {
    Route::get('/', 'DashboardController@index')->name('dashboard');

//    Route::get('file-manager' ,function () {
//        return view('vendor.file-manager') ;
//    });

    //ATOM
    Route::resource('permission',                            'Atom\PermissionController') ;
    Route::resource('role',                                  'Atom\RoleController') ;
    Route::resource('admin-users',                                 'Atom\AdminController') ;
    Route::resource('template',                              'Atom\TemplateController') ;
    Route::resource('page',                                  'Atom\PageController') ;
    Route::resource('simple-item',                           'Atom\SimpleItemController') ;
    Route::resource('menu',                                  'Atom\MenuController') ;
    Route::resource('article',                               'Atom\ArticleController') ;
    Route::resource('position',                               'Atom\PositionController') ;
    Route::resource('profession',                               'Atom\ProfessionController') ;
    Route::resource('vacancy',                               'Atom\VacancyController') ;
    Route::resource('survey-subject',                               'Atom\SurveySubjectController') ;
    Route::resource('survey-question',                               'Atom\SurveyQuestionController') ;
    Route::resource('baku-for-tourist',                               'Atom\BakuForTouristController') ;
    Route::resource('baku-for-tourist-item',                               'Atom\BakuForTouristItemController') ;
    Route::resource('stations',                               'StationController') ;
    Route::resource('search',                               'Atom\SearchController') ;
    Route::resource('vacancy-apply',                               'Atom\VacancyApplyController') ;


    Route::resource('contact',                               'Atom\ContactController') ;


    Route::get('test',       'Atom\ExtraController@test');

    Route::post('menu-item/create',                               'Atom\MenuController@menu_item_store')->name('menu-item.store') ;
    Route::delete('menu-main/{id}',                               'Atom\MenuController@main_destroy')->name('menu-main.destroy') ;
    Route::get('menu-item/edit/',                                 'Atom\MenuController@menu_item_edit')->name('menu-item.edit') ;
    Route::put('menu-item/update/{id}',                           'Atom\MenuController@menu_item_update')->name('menu-item.update') ;
    Route::put('menu-item/sort',                                  'Atom\MenuController@menu_item_sort')->name('menu-item.sort') ;

    Route::get('simple-items/json',                               'Atom\SimpleItemController@index_json')->name('simple-json.index') ;
    Route::get('simple-items/json/create',                        'Atom\SimpleItemController@json_create')->name('simple-json.create') ;
    Route::post('simple-items/json/create',                       'Atom\SimpleItemController@json_store')->name('simple-json.store') ;
    Route::get('simple-items/json/{id}/edit',                     'Atom\SimpleItemController@json_edit')->name('simple-json.edit') ;
    Route::put('simple-items/json/{id}',                          'Atom\SimpleItemController@json_update')->name('simple-json.update') ;
    Route::delete('simple-items/json/{id}',                       'Atom\SimpleItemController@json_destroy')->name('simple-json.destroy') ;

    Route::get('art-types',                               'Atom\ArticleTypeController@index_json')->name('article-types.index') ;
    Route::get('art-types/create',                        'Atom\ArticleTypeController@json_create')->name('article-types.create') ;
    Route::post('art-types/create',                       'Atom\ArticleTypeController@json_store')->name('article-types.store') ;
    Route::get('art-types/{id}/{type}/edit',                     'Atom\ArticleTypeController@json_edit')->name('article-types.edit') ;
    Route::put('art-types/{id}/{type}',                          'Atom\ArticleTypeController@json_update')->name('article-types.update') ;
    Route::delete('art-types/{id}/{type}',                       'Atom\ArticleTypeController@json_destroy')->name('article-types.destroy') ;


    Route::get('simple-items/json/create',                        'Atom\SimpleItemController@json_create')->name('simple-json.create') ;
    Route::post('simple-items/json/create',                       'Atom\SimpleItemController@json_store')->name('simple-json.store') ;


    Route::group(config('app_settings.route_settings'), function () {
        Route::get(config('app_settings.url'), config('app_settings.controller').'@index')->name('.index');
        Route::post(config('app_settings.url'), config('app_settings.controller').'@store')->name('.store');
    });


    //Remove Files,Images...
    Route::delete('remove-photo/{model}/{id}/{field?}/{path?}',       'Atom\ExtraController@removePhoto')->name('remove-photo');
    //END ATOM
});





