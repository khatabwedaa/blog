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

/*
/ +++++++++++++ resource Routes +++++++++++++:
*/
Route::resource('posts', 'PostController');
//-----------------------------------------
Route::resource('tags', 'TagController')->except('create');
//---------------------------------------------------------
Route::resource('categories', 'CategoryController')->except('create');
//--------------------------------------------------------------------
Route::resource('comments', 'CommentsController')->only('edit' , 'update' , 'destroy');
//------------------------------------------------------------------------------------

/*
/ +++++++++++++++ Get Routes +++++++++++++++ :
*/
Route::get('/', 'PagesControllers@getIndex');
//-------------------------------------------
Route::get('about', 'PagesControllers@getAbout');
//-----------------------------------------------
Route::get('contact', 'PagesControllers@getContact');
// --------------------------------------------------
Route::get('blog', 'BlogController@getIndex')->name('blog.index');
//----------------------------------------------------------------
Route::get('comments/{id}/delete', 'CommentsController@delete')->name('comments.delete');
//--------------------------------------------------------------------------------------
Route::get('blog/{slug}' , 'BlogController@getSingle')->name('blog.single')->where('slug' , '[\w\d\-\_]+');
//---------------------------------------------------------------------------------------------------------

/*
/ +++++++++++++++ Post Routes +++++++++++++++ :
*/
Route::post('contact', 'PagesControllers@postContact');
//------------------------------------------------------
Route::post('comments/{post_id}', 'CommentsController@store')->name('comments.store');
//-------------------------------------------------------------------------------------
