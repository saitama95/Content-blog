<?php

use App\Http\Controllers\PostController;

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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('test',function(){
//     return App\Tag::find(7)->posts;
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){

    Route::get('post/create',[
        'uses'=>'PostController@create',
        'as'=>'post.create'
    ]);
    Route::post('post/store',[
        'uses'=>'PostController@store',
        'as'=>'post.store'
    ]);
    Route::post('category/store',[
        'uses'=>'CategoryController@store',
        'as'=>'category.store'
    ]);
    Route::get('category/create',[
        'uses'=>'CategoryController@create',
        'as'=>'category.create'
    ]);
    Route::get('category/index',[
        'uses'=>'CategoryController@index',
        'as'=>'category.index'
    ]);
    Route::get('category/destroy/{id}',[
        'uses'=>'CategoryController@destroy',
        'as'=>'category.destroy'
    ]);
    Route::get('category/edit/{id}',[
        'uses'=>'CategoryController@edit',
        'as'=>'category.edit'
    ]);
    Route::post('category/update/{id}',[
        'uses'=>'CategoryController@update',
        'as'=>'category.update'
    ]);
    Route::get('post',[
        'uses'=>'PostController@index',
        'as'=>'post'
    ]);
    Route::get('post/delete/{id}',[
        'uses'=>'PostController@destroy',
        'as'=>'post.destroy'
    ]);
    Route::get('post/trashed',[
        'uses'=>'PostController@trashed',
        'as'=>'post.trashed'
    ]);
    Route::get('post/kill/{id}',[
        'uses'=>'PostController@kill',
        'as'=>'post.kill'
    ]);
    Route::get('post/restore/{id}',[
        'uses'=>'PostController@restore',
        'as'=>'post.restore'
    ]);
    Route::get('post/edit/{id}',[
        'uses'=>'PostController@edit',
        'as'=>'post.edit'
    ]);
    Route::post('post/update/{id}',[
        'uses'=>'PostController@update',
        'as'=>'post.update'
    ]);
    Route::get('tag',[
        'uses'=>'TagController@index',
        'as'=>'tag'
    ]);
    Route::get('tag/create',[
        'uses'=>'TagController@create',
        'as'=>'tag.create'
    ]);
    Route::post('tag/store',[
        'uses'=>'TagController@store',
        'as'=>'tag.store'
    ]);

    Route::get('tag/edit/{id}',[
        'uses'=>'TagController@edit',
        'as'=>'tag.edit'
    ]);
    Route::post('tag/update/{id}',[
        'uses'=>'TagController@update',
        'as'=>'tag.update'
    ]);
    Route::get('tag/delete/{id}',[
        'uses'=>'TagController@destroy',
        'as'=>'tag.destroy'
    ]);
});

