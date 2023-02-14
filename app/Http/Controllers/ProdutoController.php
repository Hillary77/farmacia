<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdutoController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $produtos = produto::All();
        return view('produto.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view(view: 'produto/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $validador = $request->validate([
            'name_product' => ['required'],
            'description' => ['required'],
            'valor' => ['required'],
            'stock' => ['required'],
            'imagem' => ['required|image'],
        ]);

        $user = new produto();
        $user->name_product = $request->name_product;
        $user->description = $request->description;
        $user->valor = $request->valor;
        $user->stock = $request->stock;
        $user->image = $request->image;
        $user->save();

        //REDIRECIONAR DEPOIS DE EXECURTADO
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto) {
        return view('produto.edit', ['item' => $produto]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto) {
        $produto->name_product = $request->input('name_product');
        $produto->description = $request->input('description');
        $produto->valor = $request->input('valor');
        $produto->stock = $request->input('stock');
        $produto->image = $request->input('image');
        $produto->save();
        return redirect()->route('produto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto) {
        $produto->delete();
        return redirect()->route('produto.index');
    }

}
