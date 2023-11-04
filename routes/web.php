<?php

use App\Http\Controllers\CozinhaController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProdutosController;
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

//Página ínicial
Route::get('/',[FuncionariosController::class,'index']);
Route::post('/',[FuncionariosController::class,'store']);

//Página da listagem de produtos
Route::get('/index',[ProdutosController::class,'index']);
Route::post('/index',[ProdutosController::class,'edit']);

//Formulario para adicionar novos produtos
Route::get('/create',[ProdutosController::class,'create']);
Route::post('/create',[ProdutosController::class,'store']);

//rotas de referencia a pedidos
Route::get('/fazerpedido',[PedidosController::class,'index']);
Route::post('/fazerpedido', [PedidosController::class,'store']);

//rotas de referencia a cozinha
Route::get('/pedidos',[CozinhaController::class,'index']);
Route::put('/pedidos/{idPed}', [CozinhaController::class, 'store']);

