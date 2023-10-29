<?php

namespace App\Http\Controllers;
use App\Models\Estoque;
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

        $request->validate([
            'idProd' => 'required|array|min:1', // 'idProd' deve ser um array com pelo menos 1 elemento
            'qtdItem' => 'required|array|min:1', // 'qtdItem' deve ser um array com pelo menos 1 elemento
        ], [
            'idProd.required' => 'Selecione pelo menos um produto.',
            'qtdItem.required' => 'Informe a quantidade para o(s) produto(s) selecionado(s).',
        ]);

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
                'idPed' => $pedido->id,
                'idProd' => $idProduto,
                'qtdItemPed' => $qtdItemPed,
                'valorUnItem' => $precoProd,
                'valorTotal' => $valorTotal
            ]);

            try {
                $item->pedido()->associate($pedido);
                $item->save();

                $produto = Estoque::where('idProd', $idProduto)->first();

                //dd('Quantidade Atual: ' . $produto->qtdEst, 'Quantidade a ser subtraída: ' . $qtdItemPed);
                if ($produto) {
                    $produto->qtdEst = max(0, $produto->qtdEst- $qtdItemPed);
                    $produto->save();
                }
            } catch (Exception $e) {
                dd($e->getMessage());
                session()->flash('erro', 'Ocorreu um erro ao processar o pedido.');
                return redirect()->back();
            }
        }

        $ultimoPedido = Pedido::latest('idPed')->first();

        if ($ultimoPedido) {
        $idPed = $ultimoPedido->idPed;

        $totalItens = ItemPedido::where('idPed', $idPed)->sum('valorTotal');

        $ultimoPedido->update([
            'dtPed' => Carbon::now(),
            'totalPedido' =>  $totalItens,
            ]);

        } else {
            session()->flash('erroValorT', 'Não foi possível colocar o valor total');
            return redirect()->back();
        }
        session()->flash('pedidoEnviado', 'Pedido enviado com sucesso');
        return redirect()->back();


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
