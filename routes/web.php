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
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/admin/novoaluno', 'HomeController@novoaluno');
Route::get('/admin/alunos', 'HomeController@alunos');
Route::get('/admin/novaaf/{access_code}', 'HomeController@novaaf');
Route::get('/admin/af/{code}', 'HomeController@afs');

/* Dados do aluno */
Route::post('/aluno/store', 'AlunoController@store')->name('aluno.store');
Route::get('/aluno/show/{access_code}', 'AlunoController@show');
Route::post('/aluno/destroy/{access_code}', 'AlunoController@destroy');
Route::get('/aluno/edit/{access_code}', 'AlunoController@edit');
Route::post('/aluno/update/{access_code}', 'AlunoController@update');

/* Dados da avaliação fisica */
Route::post('/AF/store', 'AFController@store')->name('AF.store');