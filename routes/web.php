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

Route::get('/', "WelcomeController@index")->name("index");

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('admin');

// Routes for trainings (edit, show, create, destroy)
Route::resource('recettes', 'RecipesController');

// Routes for articles (edit, show, create, destroy)
Route::resource('articles', 'ArticlesController');

Route::post('ajoutCommentaire', 'RecipesController@ajoutCommentaire')->name('ajoutCommentaire');
Route::get('modifierCommentaire/{id}', 'RecipesController@modifierCommentaire')->name('modifierCommentaire');
Route::get('supprimerCommentaire/{id}', 'RecipesController@supprimerCommentaire')->name('supprimerCommentaire');
Route::put('updateCommentaire/{id}', 'RecipesController@updateCommentaire')->name('updateCommentaire');