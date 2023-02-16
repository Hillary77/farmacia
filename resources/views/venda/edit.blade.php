@extends('layouts.header')
@section('content')

<div class="container">
    <!-- Init tabela -->
    <div class="card shadow mb-4">
        <!-- informações do que possui na tabela dentro do card -->
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">Editar carrinho de compra</h2>
        </div>

        <form action="#" method="POST"> 
            @csrf
            @method('PUT')
            <div class="card-body">

                <select class="form-control" name="client_id">
                    @foreach($vendas as $v)
                    <option value="{{ $v->client_id }}" selected>Cliente</option>
                    @endforeach
                    
                    @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                    @endforeach
                </select>

                <div class="table-responsive">
                    <hr>
                    <table class="table table-sm table-striped table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Produto</th>
                                <th>Valor</th>
                                <th>Estoque</th>
                                <th>Quantidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vendas as $venda)

                            <tr>
                                <td><input type='checkbox' value='{{$venda->product_id }}' {{ $checked =  $venda->id  == $venda->product_id  ? 'checked' : 'null'; }}></td>
                                <td>{{ $venda->relProduto->name_product}}</td>
                                <td>{{ 'R$' .number_format($venda->relProduto->valor, 2, ',', '.') }}</td>
                                <td>{{ $venda->relProduto->stock}}</td>
                                <td><input type='number' value='{{$venda->quantity}}'></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                        <button type = "submit" class = "btn btn-primary btn-user">Confirmar compra</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection