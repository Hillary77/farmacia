<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ClienteController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //Puxar todos os dados do banco e manda para uma página visão
        $users = cliente::All();
        
        return view('cliente.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //Retrnar visão pela rota cliente/create
        return view(view: 'cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $validador = $request->validate([
            'name' => ['required'],
            'rg' => ['required'],
            'birth' => ['required'],
            'phone' => ['required'],
            'email' => ['required'],
            'cpf' => ['required'],
            'state' => ['required'],
            'address' => ['required'],
            'cep' => ['required'],
        ]);
dd($validador);
        //SALVAR DADOS NO DB
        //melhor forma de cadastrar formulário menor
        $user = new cliente();
        $user->name = $request->name;
        $user->rg = $request->rg;
        $user->birth = $request->birth;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->cpf = $request->cpf;
        $user->state = $request->state;
        $user->address = $request->address;
        $user->cep = $request->cep;
        $user->save();

        //REDIRECIONAR DEPOIS DE EXECURTADO

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente) {
        //Aparecer dados especificos na página editar
        return view('cliente.edit', ['user' => $cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente) {
        
        //Atualizar dados ja cadastrados no banco de dados
        $cliente->name = $request->input('name');
        $cliente->rg = $request->input('rg');
        $cliente->birth = $request->input('birth');
        $cliente->phone = $request->input('phone');
        $cliente->email = $request->input('email');
        $cliente->cpf = $request->input('cpf');
        $cliente->state = $request->input('state');
        $cliente->address = $request->input('address');
        $cliente->cep = $request->input('cep');
        $cliente->save();
        //Redirecionar depois de concluído
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente) {
        //Remover dados do banco de dados
        $cliente->delete();
        return redirect()->route('cliente.index');
    }

}
