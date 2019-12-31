<?php

Route::prefix('{locale}')->middleware('setLanguage')->group(function () {
    Route::get('/test-locale', function () {
        return __('auth.failed');
    });
});
Auth::routes();

// Dashbord
Route::get('/posts/create', 'Dashbord\PostController@create');
Route::post('/posts', 'Dashbord\PostController@store')->name('posts.store');


// Blog
Route::get('/', 'Blog\PagesControllers@index')->name('home');
Route::get('about', 'Blog\PagesControllers@about')->name('about');
Route::get('contact', 'Blog\PagesControllers@contact')->name('contact');

Route::get('blog', 'Blog\BlogController@index')->name('blog.index');
Route::get('blog/{slug}', 'Blog\BlogController@show')->name('blog.show');




// //-------------------------------------------
// //-----------------------------------------------
// // --------------------------------------------------
// Route::post('contact', 'PagesControllers@postContact')->name('contact.send');
// //------------------------------------------------------
// //----------------------------------------------------------------
// Route::post('comments/{post_id}', 'CommentsController@store')->name('comments.store');
// //-------------------------------------------------------------------------------------
//---------------------------------------------------------------------------------------------------------


// //-----------------------------------------
// Route::resource('tags', 'TagController')->except('create');
// //---------------------------------------------------------
// Route::resource('categories', 'CategoryController')->except('create');
// //--------------------------------------------------------------------
// Route::resource('comments', 'CommentsController')->only('edit', 'update', 'destroy');
// //-----------------------------------------------------------------------------------
// Route::get('comments/{id}/delete', 'CommentsController@delete')->name('comments.delete');
//---------------------------------------------------------------------------------------
