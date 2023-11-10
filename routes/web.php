<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index',[ProdutosController::class,'index']);

//Formulario para adicionar novos produtos
Route::get('/create',[ProdutosController::class,'create']);
Route::post('/create',[ProdutosController::class,'store']);
Route::get('/movimentacao',[ProdutosController::class,'movimentacao']);
Route::post('/movimentacao', [ProdutosController::class,'movimentacaoEstoque']);
Route::get('/produtos/{idProd}/editar', [ProdutosController::class,'editar']);
Route::patch('/produtos/{id}/atualizar', [ProdutosController::class,'atualizar']);


<<<<<<< Updated upstream
=======
//rotas de referencia a cozinha alteração de status
Route::get('/pedidos',[CozinhaController::class,'index']);
Route::get('/pedidos/{id}/edit', [CozinhaController::class, 'edit'])->name('pedidos.edit');
Route::post('/pedidos/{id}/edit',[CozinhaController::class,'edit']);
Route::get('/pedidosProntos',[CozinhaController::class,'create']);
Route::get('/pedidosAdm',[CozinhaController::class,'indexAdm']);

//rota view de escolhas ADMINISTRADOR
Route::view('/principal','principal');
Route::view('/SemPagina','semPagina');


>>>>>>> Stashed changes
Página ínicial
Route::post('/',[FuncionariosController::class,'store']);

//Página da listagem de produtos
Route::get('/index',[ProdutosController::class,'index']);
Route::post('/index',[ProdutosController::class,'edit']);

//rotas de referencia a pedidos
Route::get('/fazerpedido',[PedidosController::class,'index']);
Route::post('/fazerpedido', [PedidosController::class,'store']);

//rotas de referencia a cozinha alteração de status
Route::get('/pedidos',[CozinhaController::class,'index']);
Route::get('/pedidos/{id}/edit', [CozinhaController::class, 'edit'])->name('pedidos.edit');
Route::post('/pedidos/{id}/edit',[CozinhaController::class,'edit']);
Route::get('/pedidosProntos',[CozinhaController::class,'create']);
Route::get('/pedidosAdm',[CozinhaController::class,'indexAdm']);

//rota view de escolhas ADMINISTRADOR
Route::view('/principal','principal');
Route::view('/SemPagina','semPagina');
