<?php

use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;



Route::get('/', 'App\Http\Controllers\PostController@index');
