<?php

use App\Http\Controllers\PostsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

route::get('users', 'App\Http\Controllers\RespuestaController@users');

route::get('posts/top', 'App\Http\Controllers\RespuestaController@postsTop');

route::get('posts/{id}', 'App\Http\Controllers\RespuestaController@postsId');
