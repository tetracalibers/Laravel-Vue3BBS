<?php

use Illuminate\Support\Facades\Route;

Route::get('/bbs', 'App\Http\Controllers\PostController@index');

Route::get('/bbs/existingComments', 'App\Http\Controllers\PostController@sendExistingComments');
Route::post('/bbs/contribute', 'App\Http\Controllers\PostController@contribute');
