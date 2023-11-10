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



Route::get('/confirmacao', function(){
    return view('/confirmacao');
});
