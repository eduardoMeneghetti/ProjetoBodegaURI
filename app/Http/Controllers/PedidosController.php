<?php

namespace App\Http\Controllers;
use App\Models\ItemPedido;
use App\Models\Pedido;
use App\Models\Produto;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();
        return view('pedidos.fazerpedido', compact('produtos'));
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
        //dd($request->all());

        $pedido = Pedido::create([
            'dtPed' => $request->input('dtPed'),
            'totalPedido' => $request->input('totalPedido'),
            'mesa' => 1,
            'obsPed' => $request->input('obsPed'),
            'idFunc' => $request->input('idFunc'),
            'liberado' => 'N',
        ]);

        $idProdutos = $request->input('idProd');

        foreach ($idProdutos as $idProduto) {
            $precoProd = DB::table('produtos')->where('idProd', $idProduto)->value('precoProd');
            $qtdItemPed = $request->input('qtdItem')[$idProduto];
            $valorTotal = $precoProd * $qtdItemPed;

            $item = new ItemPedido([
                'idPed' => $pedido->idPed,
                'idProd' => $idProduto,
                'qtdItemPed' => $qtdItemPed,
                'valorUnItem' => $precoProd,
                'valorTotal' => $valorTotal
            ]);
            $item->save();
        }


        $pedido->update([
            'dtPed' => Carbon::now(),
            'totalPedido' => 22.2,
       ]);


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
