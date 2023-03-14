<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $dados = Venda::select(DB::raw('SUM(vendas.total_un) as total, SUM(vendas.quantity) as quantity'))->get();

        $stock = Produto::select(DB::raw('SUM(produtos.stock) as stock'))->get();

        $data = Venda::select('created_at', 'total_un')
                ->orderBy('created_at')
                ->get()
                ->groupBy(function ($data) {
            return Carbon::parse($data->created_at)->format('M');
        });

        $mes = [];
        $valor = [];

        foreach ($data as $key => $value) {

            $mes[] = $key;
            $valor[$key] = $value->sum('total_un');
        }

        $venda = Venda::select('clientes.name', 'vendas.code', DB::raw('ROUND(SUM(vendas.total_un),2) as total'))
                ->join('clientes', 'vendas.client_id', '=', 'clientes.id')
                ->groupBy('clientes.name', 'vendas.code')
                ->limit(3)
                ->get();

        $nome = [];
        $total = [];
        foreach ($venda as $key => $value) {

            $nome[] = $value->name;
            $total[$key] = $value->total;
        }

        return view('home', ['mes' => $mes, 'valor' => $valor, 'total' => $total, 'nome' => $nome, 'dados' => $dados, 'stock' => $stock]);
    }

}
