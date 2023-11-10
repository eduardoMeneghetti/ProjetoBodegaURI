<?php

namespace App\Http\Controllers;

use App\Models\ItemPedido;
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
    ->orderBy('pedidos.idPed', 'asc') // Ordena pelo ID do pedido em ordem crescente
    ->get();

    return view('cozinha.pedidos', compact('pedidos'));


    }

    public function indexAdm()
    {
        $pedidos = Pedido::join('intempedidos', 'pedidos.idPed', '=', 'intempedidos.idPed')
        ->join('produtos', 'produtos.idProd', '=', 'intempedidos.idProd')
        ->where('liberado', 'N')
        ->selectRaw('*, DATE_FORMAT(dtPed, "%d/%m/%Y %H:%i:%s") as dataPedidoFormatada')
        ->orderBy('pedidos.idPed', 'asc') // Ordena pelo ID do pedido em ordem crescente
        ->get();

        return view('cozinha.pedidosAdm', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pedidos = Pedido::join('intempedidos', 'pedidos.idPed', '=', 'intempedidos.idPed')
        ->join('produtos', 'produtos.idProd', '=', 'intempedidos.idProd')
        ->where('liberado', 'S')
        ->selectRaw('*, DATE_FORMAT(dtPed, "%d/%m/%Y %H:%i:%s") as dataPedidoFormatada')
        ->orderBy('pedidos.idPed', 'asc') // Ordena pelo ID do pedido em ordem crescente
        ->get();

        return view('cozinha.pedidosProntos', compact('pedidos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $itemPedido = ItemPedido::where('idItemPed', $id)->first();
        //dd($itemPedido);

        if ($itemPedido) {
            $itemPedido->liberado = 'S';
            $itemPedido->save();
            return redirect('/pedidos')->with('success', 'Pedido enviado com sucesso');
        } else {
            return redirect('/pedidos')->with('error', 'Erro ao enviar o pedido');
        }
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
