<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Movimests;
use App\Models\Estoques;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$produtos = Produto::all();
        //return view('produtos.index', compact('produtos'));

        $sql = "SELECT p.idProd, p.nomeProd, p.precoProd, p.descricaoProd, p.ativo, p.tipo, e.qtdEst\n"

            . "FROM produtos as p\n"

            . "INNER JOIN estoques as e\n"

            . "ON p.idProd = e.idProd;";

        $produtos = DB::select($sql);


        return view('produtos.index', compact('produtos'));
    }


    public function editar($id)
    {

        $produto = Produto::find($id);

        return view('produtos.editar', compact('produto'));
    }


    public function atualizar(Request $request, $id)
    {
        // Validação dos campos de edição aqui, se necessário

        $produto = Produto::find($id);

        // Atualize os campos do produto com base nos dados do formulário
        $produto->nomeProd = $request->input('nomeProd');
        // Atualize outros campos aqui
        $produto->save();

        return redirect('/produtos')->with('success', 'Produto atualizado com sucesso.');
    }











    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */



    public function store(Request $request)
    {
        $messages = [
            'nomeProd.required' => 'O campo Nome do Produto é obrigatório.',
            'precoProd.required' => 'O campo Preço do Produto é obrigatório.',
            'precoProd.numeric' => 'O campo Preço do Produto deve ser um número.',
            'descricaoProd.required' => 'O campo Descrição é obrigatório.',
        ];

        $validator = Validator::make($request->all(), [
            'nomeProd' => 'required',
            'precoProd' => 'required|numeric',
            'descricaoProd' => 'required',
            'tipo' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        $nomeProd = $request->input('nomeProd');
        $precoProd = $request->input('precoProd');
        $descricaoProd = $request->input('descricaoProd');
        $ativo = $request->input('ativo') ? 1 : 0; // Define como 1 se estiver selecionado no formulário, senão, 0
        $tipo = $request->input('tipo');

        DB::table('produtos')->insert([
            'nomeProd' => $nomeProd,
            'precoProd' => $precoProd,
            'descricaoProd' => $descricaoProd,
            'ativo' => $ativo,
            'tipo' => $tipo
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        return back()->with('success', 'Produto cadastrado com sucesso!');
    }


    //MOVIMENTAÇÕES DE ESTOQUE
    public function movimentacao()
    {
        $products = Produto::allProducts();
        return view('produtos.movimentacao', compact('products'));
    }


    //Atualiza o Estoque
    public function movimentacaoEstoque(Request $request)
    {


        //tratamento de Inserção de dados Erradas
        //---------------------------------------------------------------------
        $messages = [
            'nomeProd.required' => 'O produto selecionado é Inválido.',
            'quantidade.required' => 'Quantidade do produto é Inválida.',
            'dtMov.required' => 'Informe uma Data'
        ];

        $validator = Validator::make($request->all(), [
            'nomeProd' => 'required',
            'quantidade' => 'required|numeric',
            'dtMov' => 'required|date',
        ], $messages);
        //----------------------------------------------------------------------

        //Armazena os valores digitados nos campos em variáveis
        //----------------------------------------------------------------------
        $produtoID = $request->input('produto');
        if ($produtoID == null) return back()->with('fail', 'Precisa selecionar um produto');


        $quantidadeProduto = $request->input('quantidade');
        if ($quantidadeProduto == null) return back()->with('fail', 'Precisa selecionar uma quantidade');

        $tipoMovimentacao = $request->input('tipo_movimentacao');
        $dtMovimentacao = $request->input('dtMov');

        //----------------------------------------------------------------------
        $quantidadeEstoque = DB::select("SELECT qtdEst FROM estoques WHERE idProd = $produtoID");


        if (!empty($quantidadeEstoque)) {
            $quantidadeEstoque = $quantidadeEstoque[0]->qtdEst;

            if (($quantidadeEstoque < $quantidadeProduto or $quantidadeProduto <= 0) and ($tipoMovimentacao == 'S')) {
                return back()->with('fail', 'Quantidade em estoque indisponível ou quantidade inserida menor ou igual a 0');
            } else {
                DB::table('movimests')->insert([
                    'idProd' => $produtoID,
                    'qtdEst' => $quantidadeProduto,
                    'operacao' => $tipoMovimentacao,
                    'dtMov' => $dtMovimentacao,
                ]);

                return back()->with('success', 'Estoque do item ' . $produtoID . ' atualizado');
            }
        } else {
            return back()->with('fail', 'Produto não encontrado no estoque');
        }



        //Valida as falhas de campos inseridos incorretamente
        //----------------------------------------------------------------------
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        //----------------------------------------------------------------------










    }
}
