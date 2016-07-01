<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('/jeu/', 'GameController@index');

Route::get('/profil/', 'ProfileController@index');

Route::get('/classement/', 'ClassementController@index');

Route::post('/getmusic', 'GameController@getMusic');

Route::post('/numbermusic', 'GameController@numberMusic');

Route::post('/game/aftergame', 'GameController@afterGame');

Route::post('/getimgprofile', 'ProfileController@getImg');

Route::post('/uploadimage','ProfileController@uploadImg');

Route::get('/connexion','ConnectionController@index');

Route::get('/instructions', 'InstructionsController@index');

Route::get('/categories', 'CategoriesController@index');

Route::get('/mode', 'ModeController@index');

Route::auth();