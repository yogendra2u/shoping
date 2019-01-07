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

Route::get('/', function () {
    return view('frantend_home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about_us', 'HomeController@about_us');
Route::resource('tasks', 'TaskController');

Route::get('/create/ticket','TicketController@create');
Route::post('/create/ticket','TicketController@store');
Route::get('/tickets', 'TicketController@index');
Route::get('/edit/ticket/{id}','TicketController@edit');
Route::patch('/edit/ticket/{id}','TicketController@update');
Route::delete('/delete/ticket/{id}','TicketController@destroy');

Route::get('uploadfile','ImageController@uploadfile');
Route::post('uploadfile','ImageController@store');

Route::get('watermark','ImageController@watermark');



/*******************Item************************************/

Route::get('/create/item','ItemController@create');
Route::post('/create/item','ItemController@store');
Route::get('/item', 'ItemController@index');
Route::get('/edit/item/{id}','ItemController@edit');
Route::patch('/edit/item/{id}','ItemController@update');
Route::delete('/delete/item/{id}','ItemController@destroy');

/*******************************************************/


/********************sending email***************************/

Route::get('/send/email', 'ItemController@mail');

/*************mychart****************************/

Route::get('/chart', 'ItemController@chart');


Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');


Route::get('datatable', 'DataTableController@datatable');
// Get Data
Route::get('datatable/getdata', 'DataTableController@getPosts')->name('datatable/getdata');


//Route::get('users', 'UsersController@index');

Route::resource('users', 'UsersController');