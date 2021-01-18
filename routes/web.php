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

Route::get('/', 'PageC@index')->name('index');
Route::get('/hello', 'PageC@hello');
Route::post('/hello', 'PageC@StoreUser');
Route::get('clear', 'PageC@clear');
Route::get('about', 'PageC@about');
Route::get('/close', function () {
    return "Sorry";
});



Route::get('/hi{id?}', function ($id = null ){
    echo"Welcome:  ".$id;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('articles','ArticleController');
Route::post('comment/{article}','CommentController@store')->name('comment.store');
