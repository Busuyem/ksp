<?php

use App\Mail\Contact;

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

Route::get('/', "HomeController@home");


Route::get('/email', function () {

    return new Contact();

});

Auth::routes();

//Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::get('/dashboard', 'DashboardController@dash')->name('dashboard')->middleWare('auth');
Route::get('/users', 'DashboardController@allUsers')->name('allUsers')->middleWare('auth');
Route::delete('users/{user}', 'DashboardController@delUsers')->name('delUsers')->middleWare('auth');

Route::get('/post', 'PostsController@index')->name('posts.post')->middleWare('auth');
Route::Post('/post', 'PostsController@addPost')->name('posts.post')->middleWare('auth');
Route::get('/post/{id}', 'PostsController@showpost')->name('showpost')->middleWare('auth');
Route::get('/post/{id}/edit', 'PostsController@editpost')->name('editpost')->middleWare('auth');
Route::post('/post/{id}', 'PostsController@updatePost')->name('updatePost')->middleWare('auth');
Route::get('/dePost/{id}', 'PostsController@destroyPost')->name('destroyPost')->middleWare('auth');
Route::post('/postsearched', 'PostsController@search')->name('posts.search')->middleWare('auth');


Route::get('/like/{id}', 'PostsController@like')->name('like')->middleWare('auth');
Route::get('/dislike/{id}', 'PostsController@disLike')->name('dislike')->middleWare('auth');


Route::post('/comment/{id}', 'PostsController@addComments')->name('addComments')->middleWare('auth');
Route::get('/comment/{id}', 'PostsController@allComments')->name('allComments')->middleWare('auth');
Route::get('/comments/{id}', 'CommentController@delComments')->name('delComments')->middleWare('auth');
Route::get('/comments/{id}/edit', 'CommentController@editComments')->name('editComments')->middleWare('auth');
Route::put('/comments/{id}', 'CommentController@updateComments')->name('updateComments')->middleWare('auth');


Route::get('/contact', 'ContactController@contact')->name('contact.create')->middleWare('auth');
Route::post('/contact', 'ContactController@contactStore')->name('contact.store')->middleWare('auth');

Route::get('/profile', 'ProfilesController@index')->name('profiles.profile')->middleWare('auth');
Route::Post('/Profile', 'ProfilesController@addProfile')->name('addProfile')->middleWare('auth');


Route::get('/category', 'CategoriesController@index')->name('categories.category')->middleWare('auth');
Route::get('/category/all', 'CategoriesController@allCat')->name('categories.allCat')->middleWare('auth');


Route::get('/category/{show}', 'CategoriesController@showCat')->name('categories.show')->middleWare('auth');
Route::get('/category/{id}/edit', 'CategoriesController@editCat')->name('categories.edit')->middleWare('auth');
Route::put('/category/{id}', 'CategoriesController@updateCat')->name('categories.update')->middleWare('auth');
Route::delete('/category/{id}', 'CategoriesController@delCat')->name('categories.delete')->middleWare('auth');
Route::post('/addCategory', 'CategoriesController@addCategory')->name('addCategory')->middleWare('auth');




