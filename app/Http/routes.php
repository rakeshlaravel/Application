<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/post/{id}', ['as'=>'home.post', 'uses'=>'AdminPostsController@posts']);

Route::resource('admin/users', 'AdminUsersController');

Route::resource('admin/posts', 'AdminPostsController');

Route::resource('admin/categories', 'AdminCategoriesController');

Route::resource('admin/media', 'MediaController');

Route::resource('admin/comments', 'PostsCommentsController');

Route::resource('admin/comment/replies', 'CommentRepliesController');

//Route::get('admin/media/create', ['as'=>'admin.media.upload','uses'=>'MediaController@store']);

Route::get('admin', function(){
   return view('layouts.admin');
});