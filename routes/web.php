<?php

Route::prefix('{locale}')->middleware('setLanguage')->group(function () {
    Route::get('/test-locale', function () {
        return __('auth.failed');
    });
});
Auth::routes();

// Dashbord
Route::get('/posts/create', 'PostController@create');
Route::post('/posts', 'PostController@store')->name('posts.store');


// Guest
Route::get('blog', 'BlogController@getIndex')->name('blog.index');
Route::get('blog/{slug}', 'BlogController@getSingle')->name('blog.single');



// Route::get('/', 'PagesControllers@getIndex')->name('home');
// //-------------------------------------------
// Route::get('about', 'PagesControllers@getAbout')->name('about');
// //-----------------------------------------------
// Route::get('contact', 'PagesControllers@getContact')->name('contact');
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
