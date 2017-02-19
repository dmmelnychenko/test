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

Route::get('/', 'HomeController@index');
Route::get('/click/', 'ClickController@clickHandler');
Route::get('/error/{click_id}', 'ClickController@showErrorPage');
Route::get('/success/{click_id}', 'ClickController@showSuccessPage');

Route::get('/domains-management', 'BadDomainController@showDomainsManagementPage');
Route::post('/add-bad-domain', 'BadDomainController@create');
Route::delete('/remove-bad-domain/{domain_id}', 'BadDomainController@delete');

