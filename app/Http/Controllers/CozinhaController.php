<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class CozinhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::join('intempedidos', 'pedidos.idPed', '=', 'intempedidos.idPed')
        ->join('produtos', 'produtos.idProd', '=', 'intempedidos.idProd')
        ->where('liberado', 'N')
        ->selectRaw('*, DATE_FORMAT(dtPed, "%d/%m/%Y %H:%i:%s") as dataPedidoFormatada')
        ->get();

        return view('cozinha.pedidos', compact('pedidos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $itemPedido = itemPedido::find($request->idPed);

        if (!$itemPedido) {
            return response()->json(['mensagem' => 'Item do pedido não encontrado'], 404);
        }

        $itemPedido->update(['liberado' => 'S']);

        return response()->json(['mensagem' => 'Situação do item do pedido atualizada com sucesso']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
