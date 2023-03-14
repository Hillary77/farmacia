@extends('layouts.header')
@section('content')

<div class="container">
    <!-- Init tabela -->
    <div class="card shadow mb-4">
        <!-- informações do que possui na tabela dentro do card -->
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">Carrinho de compra</h2>
        </div>

        <form action="{{ route('venda.store') }}" method="POST"> 
            @csrf
            <div class="card-body">

                <select class="form-control" @error('client_id') is-invalid @enderror id="client_id" name="client_id" value="{{ old('client_id') }}" required autocomplete="client_id" autofocus>
                    <option value="">Cliente</option>
                    @foreach($clientes as $value)
                    <option value="{{$value->id}}">{{ $value->name }}</option>
                    @endforeach
                    @error('name_product')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </select>
                <div class="table-responsive">
                    <hr>
                    <table class="table table-striped table table-hover" id="dataTable" width="100%" cellspacing="0">
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
                            @foreach($produtos as $value)
                        <input type="hidden" name="valor[{{ $value->id}}]" value="{{ $value->valor }}">
                        <input type="hidden" name="stock[{{ $value->id}}]" value="{{ $value->stock }}">

                        <tr>
                            <td><input class="form-check" @error('product_id') is-invalid @enderror type="checkbox" name="product_id[{{ $value->id }}]" value="{{ $value->id }}">
                                @error('product_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror</td>
                            <td>{{ $value->name_product}}</td>
                            <td>R${{  number_format($value->valor, 2,',' ,'.' )}}</td>
                            <td>{{ $value->stock}}</td>
                            <td><input type="number" id="quantity" name="quantity[{{ $value->id }}]">
                              

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