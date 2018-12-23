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


Route::get('/', 'SignaturesController@index')->name('home');
Route::get('/sign', 'SignaturesController@show')->name('sign');
Route::get('/filecopy', 'Api\FileCopyController@index');
Route::post('/unzip-file/{version}', 'Api\FileCopyController@unzipAction');

Route::get('/zipUpload', 'Api\ZipUploadController@index');
Route::post('/zipUploadToS3', 'Api\ZipUploadController@zipUploadToS3');
