<?php

use App\Mail\MensagemTesteMail;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;

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
    return view('bem-vindo');
})->name('index');

Auth::routes(['verify'=>true]); //Email de verificação ao ser criado


Route::get('/home', 'App\Http\Controllers\TarefaController@index')
    ->name('home')
    ->middleware('verified'); //Só acessa as rotas se houver verificação

Route::get('/tarefa/finished','App\Http\Controllers\TarefaController@listFinished')
    ->name('tarefa.finished')
    ->middleware('verified');

Route::post('/tarefa/restore/{id}','App\Http\Controllers\TarefaController@restore')
    ->name('tarefa.restore')
    ->middleware('verified');

Route::post('/tarefa/check/{tarefa}','App\Http\Controllers\TarefaController@check')
    ->name('tarefa.check')
    ->middleware('verified');

Route::resource('tarefa','App\Http\Controllers\TarefaController')->middleware('verified');

Route::get('/denied', 'App\Http\Controllers\HomeController@denied')
    ->name('denied');

$locale = App::currentLocale();
App::setLocale($locale);
