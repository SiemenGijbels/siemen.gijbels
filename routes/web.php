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

Route::get('/', [
    'uses' => 'PostController@getIndex',
    'as' => 'content.index'
])->name('home');

Route::get('archive', [
    'uses' => 'PostController@getArchiveIndex',
    'as' => 'content.archive'
]);

Route::get('post/{id}', [
    'uses' => 'PostController@getPost',
    'as' => 'content.post'
]);

Route::get('post/{id}/archive', [
    'uses' => 'PostController@setArchived',
    'as' => 'content.post.archive'
]);

Route::get('post/{id}/unarchive', [
    'uses' => 'PostController@setUnarchived',
    'as' => 'content.post.unarchive'
]);

Route::get('post/{id}/Like', [
    'uses' => 'PostController@getLikePost',
    'as' => 'content.post.like'
]);

Route::post('login', [
    'uses' => 'SignInController@signin',
    'as' => 'auth.signin' 
]);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

// LANGUAGES

Route::get('lang/{lang}', [
    'uses'=>'LanguageController@changeLocale',
    'as'=>'lang.switch'
]);

//  ADMIN

Route::group(['prefix' => 'admin'], function (){
    //GET routes Admin
    Route::get('', [
        'uses' => 'PostController@getAdminIndex',
        'as' => 'admin.index'
    ]);

    Route::get('create', [
        'uses' => 'PostController@getAdminCreate',
        'as' => 'admin.create'
    ]);

    Route::get('edit/{id}', [
        'uses' => 'PostController@getAdminEdit',
        'as' => 'admin.edit'
    ]);

    Route::get('delete/{id}', [
        'uses' => 'PostController@getAdminDelete',
        'as' => 'admin.delete'
    ]);

    //POST routes Admin
    Route::post('edit', [
        'uses' => 'PostController@postAdminUpdate',
        'as' => 'admin.update'
    ]);

    Route::post('create', [
        'uses' => 'PostController@postAdminCreate',
        'as' => 'admin.create'
    ]);
});

