<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Cliente;
use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;

class VendaController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $vendas = Venda::select('clientes.name', 'vendas.code', DB::raw('COUNT(*) as produtos, SUM(vendas.valor) as valor, SUM(vendas.quantity) as quantity, SUM(vendas.total_un) as total'))
                ->join('clientes', 'vendas.client_id', '=', 'clientes.id')
                ->groupBy('vendas.code', 'clientes.name')
                ->get();

        return view('venda.index', ['vendas' => $vendas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $clientes = Cliente::all();
        $produtos = Produto::all();

        return view('venda/create', ['clientes' => $clientes], ['produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validador = $request->validate([
            'client_id' => ['required'],
        ]);

        $dados = rand(0, 10000);

        foreach ($request->product_id as $key => $value) {
            $total_un = $request->valor[$key] * $request->quantity[$key];

            if ($value) {
                $insert = new Venda();
                $insert->code = $dados;
                $insert->client_id = $request->client_id;
                $insert->product_id = $value;
                $insert->quantity = $request->quantity[$key];
                $insert->valor = $request->valor[$key];
                $insert->total_un = $total_un;
                $insert->save();
            }
            if ($value) {

                $subtrair = (int) $request->stock[$key] - (int) $request->quantity[$key];

                $update = Produto::select('stock')
                        ->where('id', $value)
                        ->update(['stock' => $subtrair]);
            }
        }
        return redirect()->route('venda.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function show(Venda $venda) {

        $i = 0;
        $total = 0;

        $fpdf = new FPDF();
        $fpdf->AddPage();
        $fpdf->SetFont('Arial', 'I', 19);
        $fpdf->Cell(190, 15, utf8_decode('Nota Fiscal'), 0, 1, 'L');
        $fpdf->SetFont('Arial', 'I', 12);

        $fpdf->SetFont('Arial', 'B', 13);
        $fpdf->Cell(20, 10, 'Item', 1, 0, 'C');
        $fpdf->Cell(100, 10, utf8_decode('Produto'), 1, 0, 'C');
        $fpdf->Cell(20, 10, utf8_decode('Valor un'), 1, 0, 'C');
        $fpdf->Cell(30, 10, utf8_decode('Quantidade'), 1, 0, 'C');
        $fpdf->Cell(20, 10, utf8_decode('Subtotal'), 1, 1, 'C');

        $vendas = Venda::join('produtos', 'vendas.product_id', '=', 'produtos.id')
                ->where('code', $venda->code)
                ->get();

        foreach ($vendas as $venda) {
            $total += $venda->total_un;
            $i++;

            $fpdf->SetFont('Arial', 'I', 12);
            //chama os dados em cada coluna.
            $fpdf->Cell(20, 10, $i, 1, 0, 'C');
            $fpdf->Cell(100, 10, utf8_decode($venda->name_product), 1, 0, 'C');
            $fpdf->Cell(20, 10, 'R$' . number_format($venda->valor, 2, ',', '.'), 1, 0, 'R');
            $fpdf->Cell(30, 10, $venda->quantity, 1, 0, 'C');
            $fpdf->Cell(20, 10, 'R$' . number_format($venda->total_un, 2, ',', '.'), 1, 1, 'R');
        }
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Cell(20, 10, 'Total', 1, 0, 'C');
        $fpdf->Cell(170, 10, number_format($total, 2, ',', '.'), 1, 1, 'R');

        $fpdf->SetFont('Arial', 'B', 10);
        $fpdf->Cell(30, 10, utf8_decode('Código da venda:    '), 0, 0, 'C');
        $fpdf->Cell(5, 11, utf8_decode($venda->code), 0, 0, 'C');
        $fpdf->Cell(157, 10, utf8_decode(date('H:i:m d/m/Y')), 0, 1, 'R');

        $fpdf->Output();
        exit;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function edit(Venda $venda) {

        $clientes = Cliente::all();

        $vendas = Venda::rightjoin('produtos', 'vendas.product_id', '=', 'produtos.id')
                        ->join('clientes', 'vendas.client_id', '=', 'clientes.id')
                        ->where(function ($query) use ($venda) {
                            $query->where('code', $venda->code);
                        })->get();

        return view('venda.edit', ['clientes' => $clientes], ['vendas' => $vendas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venda $venda) {
        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venda  $venda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venda $venda) {


        $vendas = Venda::join('produtos', 'vendas.product_id', '=', 'produtos.id')
                        ->where('code', $venda->code)->get();

        foreach ($vendas as $value) {

            $soma = (int) $value->stock + (int) $value->quantity;

            if ($value) {
                $update = Produto::select('stock')
                        ->where('id', $value->id)
                        ->update(['stock' => $soma]);
            }
            if ($value) {
                $venda->delete();
            }
        }


        //Remover dados do banco de dados

        return redirect()->route('venda.index');
    }

}
