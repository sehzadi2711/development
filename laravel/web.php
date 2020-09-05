<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//with pass parameter..and without pass parameter
//Route::get('/welcome/{name?}', function ($name='rinkal') {
//    return "welcome ".$name;
//});
   
//Route::get('/home', function () {
//    return "welcome home";
//});
//redirect page
//Route::redirect('/','home');

Route::view('/','welcome',["name"=>"Rinkal jain","company"=>"rinvin tech"]);
Route::get('welcome','WelcomeController@welcome');
Route::get('rinvin','WelcomeController@rinvin');
Route::resource('post', 'PostController');

Route::resource('student','StudentController');
Route::resource('store_image','StoreImageController');
Route::post('addimage','StoreImageController@store')->name('addimage');

// Route::post('store_image/insert_image','StoreImageController@insert_image');
// Route::get('store_image/fetch_image/{id}','StoreImageController@fetch_image');





	
