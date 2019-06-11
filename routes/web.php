<?php

// Get Method
// Route::get('/about', function (){
//     return view('pages.about');
// });

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/services', 'PagesController@services');

Route::resource('posts','PostsController');
Route::get('/posts/{id}/accept','PostsController@accept');
Route::get('/turnin/{id}','PostsController@turnin');
Route::get('/dashboard/remove/{id}','PostsController@decline');

// Post Method
// Route::post('/postHi', function (){
//     return 'Hello World';
// });



Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
