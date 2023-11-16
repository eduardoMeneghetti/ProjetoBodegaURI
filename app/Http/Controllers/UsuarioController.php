<?php

namespace App\Http\Controllers;

use App\Models\Funcionario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Funcionario::all();

        return view("funcionarios.create");
    }

    public function indexList()
    {
        $usuarios = Funcionario::all();

        return view("funcionarios.index", compact("usuarios"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'nomeUser' => 'required',
            'cpfUser' => 'required',
            'funcaoUser' => 'required',
            'senhaUser' => 'required'
        ], [
            'nomeUser.required' => 'Nome do Usuário não foi preenchido',
            'cpfUser.required' => 'CPF do Usuário não foi preenchido',
            'funcaoUser.required' => 'Função do Usuário não foi preenchida',
            'senhaUser.requrided' => 'Senha do Usuário não foi preenchido'
        ]);

        $funcionario = new Funcionario( [
            'nomeFunc' => $request->input('nomeUser'),
            'cpfFunc' => $request->input('cpfUser'),
            'funcaoSistema' => $request->input('funcaoUser'),
            'senha' => $request->input('senhaUser')
        ] );

        $funcionario->save();
        return back()->with('success', 'Usuário criado com sucesso!😎');
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
        $usuario = Funcionario::where('idFunc', $id)->first();
        if(!empty($usuario)){
            return view('funcionarios.edit',['funcionarios'=> $usuario]);
        }else{
            return redirect('/indexFunc')->with('success', 'Usuário criado com sucesso!😎');
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
            $data = [
                'nomeFunc'=> $request->nomeUser,
                'cpfFunc'=> $request->cpfUser,
                'funcaoSistema'=> $request->funcaoUser,
                'senha'=> $request->senhaUser,
            ];
            Funcionario::where('idFunc', $id)->update($data);
            return redirect('/indexFunc')->with('success', 'Usuário criado com sucesso!😎');
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
