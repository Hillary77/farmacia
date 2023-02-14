@extends('layouts.header')
@section('content')
<div class="container-fluid">
    <!-- Titulo nesta página -->
    <h1 class="h3 mb-2 text-gray-800">Produtos e medicamentos</h1>

    <!-- Init tabela -->
    <div class="card shadow mb-4">
        <!-- informações do que possui na tabela dentro do card -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Registro de vendas!</h6>
        </div>
        <!--init card-body-->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Venda</th>
                            <th>Cliente</th>
                            <th>Produto</th>
                            <th>Quantidade</th>
                            <th>Total</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vendas as $venda)
                        <tr>
                            <th>{{ $venda->code }}</th>
                            <td>{{ $venda->name }}</td>
                            <td>{{ $venda->produtos }}</td>
                            <td>{{ $venda->quantity }}</td>
                            <td>{{ 'R$' .number_format($venda->total, 2, ',', '.') }}</td>
                            <td>
                                <form action="{{ route('venda.destroy', $venda->code)}}" method="POST">
                                    <a type="button" class="btn btn-outline-secondary btn-sm rounded-circle" href="{{ route('venda.show', $venda->code)}}"><i class="bi bi-filetype-pdf"></i></a>
                                    <a type="button" class="btn btn-outline-success btn-sm rounded-circle" href="{{ route('venda.edit', $venda->code) }}"><i class = 'bi bi-pencil-square'></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="venda" value="{{ ($venda->code) }}">
                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-circle"><i class = 'bi bi-trash3'></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
