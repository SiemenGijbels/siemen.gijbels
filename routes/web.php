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


//  ADMIN

Route::group(['prefix' => 'admin', 'middleware' => ['checkAdmin', 'auth']], function (){
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

    Route::get('post/{postId}/delete/{commentId}', [
        'uses' => 'CommentController@getDeleteComment',
        'as' => 'content.admin.deleteComment'
    ]);

    Route::get('post/{postId}/delete/{commentId}', [
        'uses' => 'CommentController@getDeleteComment',
        'as' => 'content.admin.deleteComment'
    ]);

    Route::get('post/{id}/adminArchive', [
        'uses' => 'PostController@setArchived',
        'as' => 'content.admin.archive'
    ]);

    Route::get('post/{id}/adminUnarchive', [
        'uses' => 'PostController@setUnarchived',
        'as' => 'content.admin.unarchive'
    ]);

    Route::get('post/{id}/adminSoftDelete', [
        'uses' => 'PostController@getSoftDelete',
        'as' => 'content.admin.softdelete'
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

// GENERAL

Route::get('/', [
    'uses' => 'PostController@getIndex',
    'as' => 'content.index'
]);

// PROFILE

Route::get('profile/{id}', [
    'uses' => 'PostController@getProfileIndex',
    'as' => 'profile.index'
]);

Route::post('profile', [
    'uses' => 'PostController@postAvatarUpdate',
    'as' => 'profile.index.changeAvatar'
]);


// ABOUT
//https://www.cloudways.com/blog/laravel-contact-form/

Route::get('about', [
    'uses' => 'ContactUsController@contactUs',
    'as' => 'content.about'
]);

Route::post('about', [
    'uses'=>'ContactUsController@contactUsPost',
    'as'=>'content.about.store'
]);


// CREATE

Route::group(['middleware' => 'auth'], function (){
    Route::get('create', [
        'uses' => 'PostController@getCreate',
        'as' => 'content.create'
    ]);

    Route::post('create', [
        'uses' => 'PostController@postCreate',
        'as' => 'content.create'
    ]);
});


// POST

Route::get('post/{id}', [
    'uses' => 'PostController@getPost',
    'as' => 'content.post'
]);

Route::get('post/{postId}/deleteComment/{commentId}', [
    'uses' => 'CommentController@getDeleteComment',
    'as' => 'content.post.deleteComment'
])->middleware('checkDeleteComment');

Route::post('post/{postId}/Like/{userId}', [
    'uses' => 'PostController@postLikePost',
    'as' => 'content.post.like'
])->middleware('checkLike');

Route::get('post/{postId}/unlike/{likeId}', [
    'uses' => 'PostController@getUnlikePost',
    'as' => 'content.post.unlike'
])->middleware('checkUnlike');

Route::post('post/{id}', [
    'uses' => 'CommentController@postCommentPost',
    'as' => 'content.post'
]);


// EDIT
Route::group(['middleware' => 'checkEdit'], function () {
    Route::get('edit/{id}', [
        'uses' => 'PostController@getEdit',
        'as' => 'content.edit'
    ]);

    Route::post('edit', [
        'uses' => 'PostController@postUpdate',
        'as' => 'content.update'
    ]);
});


// SOFT DELETE

Route::get('post/{id}/delete', [
    'uses' => 'PostController@getSoftDelete',
    'as' => 'content.post.softdelete'
])->middleware('checkSoftDelete');


// ARCHIVE

Route::get('archive', [
    'uses' => 'PostController@getArchiveIndex',
    'as' => 'content.archive'
])->middleware('auth');

Route::get('post/{id}/archive', [
    'uses' => 'PostController@setArchived',
    'as' => 'content.post.archive'
])->middleware('checkArchive');

Route::get('post/{id}/unarchive', [
    'uses' => 'PostController@setUnarchived',
    'as' => 'content.post.unarchive'
])->middleware('checkArchive');


// LANGUAGES

Route::get('lang/{lang}', [
    'uses'=>'LanguageController@changeLocale',
    'as'=>'lang.switch'
]);

// TAG

Route::get('/{name}', [
    'uses' => 'PostController@getIndexByTag',
    'as' => 'content.sortByTag'
]);

