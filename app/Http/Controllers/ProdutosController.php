<?php

namespace App\Http\Controllers;
use App\Models\Produto;
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
        $produtos = Produto::all();
        return view('produtos.index', compact('produtos'));
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
            // Adicione mais mensagens personalizadas conforme necessário
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
        $ativo = $request->input('ativo') ? 1 : 0; // Defina como 1 se estiver selecionado no formulário, senão, 0
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
