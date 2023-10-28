<?php

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


/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',[FuncionariosController::class,'index']);
Route::post('/',[FuncionariosController::class,'store']);

Route::get('/index',[ProdutosController::class,'index']);

//Formulario para adicionar novos produtos
Route::get('/create',[ProdutosController::class,'create']);
Route::post('/create',[ProdutosController::class,'store']);

//rotas de referencia a pedidos
Route::get('/fazerpedido',[PedidosController::class,'index']);
Route::post('/fazerpedido', [PedidosController::class,'store']);

