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



Auth::routes();

Route::get('/', 'PostsController@index');

//Home
Route::get('about', 'HomeController@about');
Route::get('suggestions', 'HomeController@suggestions');
Route::get('contact', 'HomeController@contact');

//POSTS
Route::get('posts', 'PostsController@index');
Route::get('posts/sort/{sort}', 'PostsController@sortIndex');
Route::get('posts', 'PostsController@index');
Route::get('posts/{post}', 'PostsController@show');

//POST EDIT
Route::post('posts/{post}/edit', 'PostsController@editPost');
Route::patch('posts/{post}', 'PostsController@update');

//POST STICKY
Route::post('posts/{post}/sticky', 'PostsController@sticky');

//POST DELETE
Route::delete('posts/{post}', 'PostsController@delete');

//POST VOTE
Route::post('posts/{post}/upvote', 'PostsController@upvote');
Route::post('posts/{post}/downvote', 'PostsController@downvote');



//COMMENT ON POST
Route::post('posts/{post}/comment', 'PostsController@addComment');
Route::post('posts', 'PostsController@addPost');

//REPLY ON COMMENT
Route::post('posts/reply/{comment}', 'CommentsController@reply');

//COMMENT EDIT
Route::post('comments/{comment}/edit', 'CommentsController@edit');
Route::patch('comments/{comment}', 'CommentsController@update');

//COMMENT DELETE
Route::delete('comments/{comment}', 'CommentsController@delete');

//Comment VOTE
Route::post('comments/{comment}/upvote', 'CommentsController@upvote');
Route::post('comments/{comment}/downvote', 'CommentsController@downvote');


//VOTE
Route::post('vote/{table}/{vote}', 'CommentsController@vote');
