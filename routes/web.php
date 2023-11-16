<?php

use App\Http\Controllers\CozinhaController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuarioController;
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

//Formulario de login
Route::get('/',[FuncionariosController::class,'index']);
Route::post('/',[FuncionariosController::class,'store']);

Route::get('/index',[ProdutosController::class,'index']);

//Formulario para adicionar novos produtos
Route::get('/create',[ProdutosController::class,'create']);
Route::post('/create',[ProdutosController::class,'store']);

//Formulario para movimentação de estoque :P
Route::get('/movimentacao',[ProdutosController::class,'movimentacao']);
Route::post('/movimentacao', [ProdutosController::class,'movimentacaoEstoque']);

//Formulario para edição de produtos
Route::get('/{idProd}/edit', [ProdutosController::class,'edit'])-> where('idProd', '[0-9]+') -> name('produtos-edit');
Route::put('/{idProd}', [ProdutosController::class,'update'])-> where('idProd', '[0-9]+') -> name('produtos-update');

//rotas de referencia a cozinha alteração de status
Route::get('/pedidos',[CozinhaController::class,'index']);
Route::get('/pedidos/{id}/edit', [CozinhaController::class, 'edit'])->name('pedidos.edit');
Route::post('/pedidos/{id}/edit',[CozinhaController::class,'edit']);
Route::get('/pedidosProntos',[CozinhaController::class,'create']);
Route::get('/pedidosAdm',[CozinhaController::class,'indexAdm']);

//rota view de escolhas ADMINISTRADOR
Route::view('/principal','principal');
Route::view('/SemPagina','semPagina');

//Página da listagem de produtos
Route::get('/index',[ProdutosController::class,'index'])-> name('produtos-index');
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


//formularios para cadastro e edição de funcionários.
Route::get('/createUser',[UsuarioController::class,'index']);
Route::post('/createUser',[UsuarioController::class,'create']);
Route::get('/indexFunc',[UsuarioController::class,'indexList']);
Route::get('/createUser/{id}/edit',[UsuarioController::class,'edit']);
Route::post('/createUser/{id}/edit',[UsuarioController::class,'edit']);
Route::put('/createUser/{id}',[UsuarioController::class,'update'])->name('funcionarios-update');
