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

Route::get('/', "MainController@index");
Route::get('forgot', 'MainController@forgot');
Route::post('forgot', 'MainController@forgotval');
Route::get('reset/{code}','MainController@reset');
Route::post('reset','MainController@resetval');
Route::get('dashboard', 'MainController@dashboard');
Route::post('validasi', 'MainController@validasi');
Route::get('logout', 'MainController@logout');

Route::get('attribute/{modul}', 'AttributeController@index');
Route::get('attribute/{modul}/create', 'AttributeController@create');
Route::post('attribute/{modul}', 'AttributeController@store');
Route::get('peoattributeple/{modul}/{id}', 'AttributeController@edit');
Route::patch('attribute/{modul}/{id}', 'AttributeController@update');
Route::get('attribute/{modul}/{id}/{param}', 'AttributeController@show');

Route::get('people/{modul}', 'PeopleController@index');
Route::get('people/{modul}/create', 'PeopleController@create');
Route::post('people/{modul}', 'PeopleController@store');
Route::get('people/{modul}/{id}', 'PeopleController@edit');
Route::patch('people/{modul}/{id}', 'PeopleController@update');
Route::get('people/{modul}/{id}/{param}', 'PeopleController@show');

Route::get('settings', 'SystemController@settings');
Route::post('general', 'SystemController@general');
Route::post('email', 'SystemController@email');
Route::post('trans', 'SystemController@trans');
Route::get('log/{modul}', 'SystemController@log');
