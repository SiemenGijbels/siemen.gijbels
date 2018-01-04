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


// AUTH STUFF

Auth::routes();

Route::post('login', [
    'uses' => 'SignInController@signin',
    'as' => 'auth.signin'
]);

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


// GENERAL

Route::get('/', [
    'uses' => 'PostController@getIndex',
    'as' => 'content.index'
]);

// TAG

Route::post('sortByTag/{id}', [
    'uses' => 'PostController@getIndexByTag',
    'as' => 'content.sortByTag'
]);

// PROFILE

Route::get('profile', [
    'uses' => 'PostController@getProfileIndex',
    'as' => 'profile.index'
]);

Route::post('profile', [
    'uses' => 'PostController@postAvatarUpdate',
    'as' => 'profile.index.changeAvatar'
]);


// ABOUT
//https://www.cloudways.com/blog/laravel-contact-form/

Route::get('about',
    'ContactUSController@contactUs'
);

Route::post('about', [
    'uses'=>'ContactUSController@contactUsPost',
    'as'=>'content.about.store'
]);


// CREATE

Route::get('create', [
    'uses' => 'PostController@getCreate',
    'as' => 'content.create'
]);

Route::post('create', [
    'uses' => 'PostController@postCreate',
    'as' => 'content.create'
]);


// POST

Route::get('post/{id}', [
    'uses' => 'PostController@getPost',
    'as' => 'content.post'
]);

Route::get('post/{postId}/deleteComment/{commentId}', [
    'uses' => 'CommentController@getDeleteComment',
    'as' => 'content.post.deleteComment'
]);

Route::post('post/{postId}/Like/{userId}', [
    'uses' => 'PostController@postLikePost',
    'as' => 'content.post.like'
]);

Route::get('post/{postId}/unlike/{likeId}', [
    'uses' => 'PostController@getUnlikePost',
    'as' => 'content.post.unlike'
]);

Route::post('post/{id}', [
    'uses' => 'CommentController@postCommentPost',
    'as' => 'content.post'
]);


// EDIT

Route::get('edit/{id}', [
    'uses' => 'PostController@getEdit',
    'as' => 'content.edit'
]);

Route::post('edit', [
    'uses' => 'PostController@postUpdate',
    'as' => 'content.update'
]);


// SOFT DELETE

Route::get('post/{id}/delete', [
    'uses' => 'PostController@getSoftDelete',
    'as' => 'content.post.softdelete'
]);


// ARCHIVE

Route::get('archive', [
    'uses' => 'PostController@getArchiveIndex',
    'as' => 'content.archive'
]);

Route::get('post/{id}/archive', [
    'uses' => 'PostController@setArchived',
    'as' => 'content.post.archive'
]);

Route::get('post/{id}/unarchive', [
    'uses' => 'PostController@setUnarchived',
    'as' => 'content.post.unarchive'
]);


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

    Route::get('post/{id}/putback', [
        'uses' => 'PostController@getPutBack',
        'as' => 'admin.post.putback'
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

