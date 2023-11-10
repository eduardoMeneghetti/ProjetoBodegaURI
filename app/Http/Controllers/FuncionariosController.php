<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FuncionariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
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
        $request->validate([
            'usuario' => 'required',
            'senha' => 'required'
        ],[
            'usuario.required' => 'Campo obrigatório não preenchido',
            'senha.required' => 'Campo obrigatório não preenchido'
        ]);

        $usuario = $request->input('usuario');
        $senha = $request->input('senha');

        $usuarioDB = DB::table('funcionarios')->where('nomeFunc', $usuario)->first();
        $idFunc = DB::table('funcionarios')->where('nomeFunc', $usuario)->value('idFunc');
        $funcaoFunc = DB::table('funcionarios')->where('idFunc', $idFunc)->value('funcaoSistema');

        if ($usuarioDB && $senha == $usuarioDB->senha) {
            //Deu certo o login do usuários
            if($funcaoFunc == 'M'){
                return redirect('/principal')->with('success', 'Login Realizado com Sucesso!');
            }else if($funcaoFunc == 'A'){
                return redirect('/fazerpedido')->with('success', 'Login Realizado com Sucesso!');
            }else if($funcaoFunc == 'C'){
                return redirect('/pedidos')->with('success', 'Login Realizado com Sucesso!');
            }

        } else {
            // Caso o usuário não exista será apresentado essa mensagem que pode ser "configurada" na
            //página de login mesmo, só utilizar o metodo session e  usar o "erro" (nome da chamada de erro)
            session()->flash('erro', 'Credenciais inválidas. Verifique seu e-mail e senha.');
            return redirect()->back();
        }

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
