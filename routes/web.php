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

Route::get('/api/config', 'ConfigController@getAll');

Route::get('/api/companies', function () {
    return view('index');
});

Route::get('/api/companies/categories', 'CompaniesController@categories');

Route::get('/api/companies/categories/{category}', 'CompaniesController@categoryDetails');

Route::get('/api/companies/filter', 'CompaniesController@filter');

Route::get('/api/companies/{id}', 'CompaniesController@getCompany');
