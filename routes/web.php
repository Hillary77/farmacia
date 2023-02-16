<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;
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

// Página Laravel
Route::get('/', function () {
    return view('Hello World');
});

//Abas Cliente
Route::resource('/cliente', ClienteController::class);

//Abas Produto
Route::resource('/cliente', ClienteController::class);

//Abas Produto
Route::resource('/produto', ProdutoController::class);

//Abas Venda/Pedidos
Route::resource('/venda', VendaController::class);


//Rota autenticação de usuário na home
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

