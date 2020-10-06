<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpreendimentoController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\CidadeController;

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
    return view('index');
});

Route::resource('empreendimento', EmpreendimentoController::class);
Route::resource('unidade', UnidadeController::class);

Route::get('/unidades/{empreendimento}', [UnidadeController::class, 'empreendimento']);


Route::get('cidades/ajaxcidade', [CidadeController::class, 'ajaxcidade']);

/*Php artisan make:controller BildController --resource --model=Bild
Php artisan make:controller BildController --resource --model=Project*/