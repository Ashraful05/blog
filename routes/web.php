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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

Route::resource('questions','QuestionController',['except'=>['show']]);
Route::resource('questions.answers','AnswerController')
                ->except('index','create','show');
Route::get('question/{slug}','QuestionController@show')->name('questions.show');

Route::post('/answers/{answer}/accept','AcceptAnswerController@accept')->name('accept.answers');



