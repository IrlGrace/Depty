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

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

Auth::routes();

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

Route::get('/home', 'PostController@index')->name('home');

Route::get('/about',function () {
    return view('about');
})->name('about');


Route::get('/profile/{id}', 'UserController@getUserProfile')->name('profile');

Route::get('/discussion', 'HomeController@getDiscussion')->name('discussion');

Route::get('/account_settings', 'UserController@getAccount')->name('account.settings');

Route::post('/create_post', 'PostController@postCreatePost')->name('post.create');

Route::get('/category/{id}', 'PostController@getDisplayPostInCategory')->name('post.incategory');

Route::get('/delete_post/{id}', 'PostController@getDeletePost')->name('post.delete');

Route::post('/edit_post', 'PostController@postEditPost')->name('post.edit');

Route::post('/support_post', 'PostController@postSupportPost')->name('post.support');

Route::post('/account_info', 'UserController@postUpdateUserInfo')->name('account.save');

Route::post('/update_user_image', 'UserController@postUpdateUserImage')->name('account.updateimage');

Route::get('/user_image/{filename}', 'UserController@getUserImage')->name('account.image');

Route::post('/update_codename', 'UserController@postUpdateCodename')->name('account.updatecodename');

Route::post('/update_password', 'UserController@postUpdatePassword')->name('account.updatepassword');

Route::post('/make_comment', 'CommentController@postMakeComment')->name('comment.make');

