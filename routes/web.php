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

Route::get('/', function () { return view('welcome'); })->name('welcome');;
Route::get('/login', function () { return view('welcome'); })->name('login');
Route::post('/login',[App\Http\Controllers\AuthController::class, 'loginUser'])->name('loginUser');
Route::post('/password',[App\Http\Controllers\AuthController::class, 'passwordRequest'])->name('passwordRequest');
Route::get('/register', function () { return view('register'); })->name('register');


Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('/painel', function () { return view('painel')->with('painelName', 'Painel'); })->name('painel');
    Route::get('/novodoc', function () { return view('novodoc')->with('painelName', 'Novo Documento'); })->name('novoDoc');
    Route::get('/procurar', function () { return view('procurar')->with('painelName', 'Procurar Documento'); })->name('procurarDoc');
    Route::post('/novodoc', 'App\Http\Controllers\DocumentoController@create')->name('novoDocPost');;
    Route::post('/procurar', 'App\Http\Controllers\ProcurarController@index');
    Route::get('/logout','App\Http\Controllers\AuthController@logout')->name('logoutUser');
    Route::get('/perfil','App\Http\Controllers\PerfilController@index')->name('perfil');

});