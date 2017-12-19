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
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'HomeController@user')->name('home');

Route::get('/add_news', function () {
    return view('add_news');
});

Route::get('/add_author', function () {
    return view('add_author');
});

Route::post('/add_news' ,  "HomeController@add_news" );
Route::post('/add_author' ,  "HomeController@add_author" );





Route::get('/all_news', function () {

     return view('all_news');
   
});

Route::get('/news/{id}', function ($id) {

     return view('news', ['id' => $id]);
   
});

Route::get('edit_news/{id}', function ($id) {

     return view('edit_news', ['id' => $id]);
   
});

Route::get('/delete_news/{id}' ,  "HomeController@delete_news" );

Route::get('/delete_image/{id}' ,  "HomeController@delete_image" );

Route::post('/edit_news/{id}' ,  "HomeController@edit_news" );








