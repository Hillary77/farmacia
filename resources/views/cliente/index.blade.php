@extends('layouts.header')

@section('content')


<!-- Titulo nesta página -->
<h1 class="h3 mb-2 text-gray-800">Clientes</h1>

<!-- Init tabela -->
<div class="card shadow mb-4">
    <!-- informações do que possui na tabela dentro do card -->
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Registro dos clientes!</h6>
    </div>
    <!--init card-body-->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>RG</th>
                        <th>Data de nascimento</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>CPF</th>
                        <th>Estatdo</th>
                        <th>Endereço</th>
                        <th>CEP</th>
                        <th>Ação</th>
                    </tr>
                </thead>

                <tbody>
                    
                    @foreach($users as $value)
                    
                    <tr>
                        <th>{{ $value->id }}</th>
                        <td>{{ $value->name }}</td>
                        <td>{{ $value->rg }}</td>
                        <td>{{ date('d/m/Y'), strtotime($value->birth) }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->cpf }}</td>
                        <td>{{ $value->state }}</td>
                        <td>{{ $value->address }}</td>
                        <td>{{ $value->cep }}</td>
                        <td>
                            <form action="{{ route('cliente.destroy', $value->id) }}" method="POST">
                                <a type="button" class="btn btn-outline-success btn-sm rounded-circle" href="{{ route('cliente.edit',$value->id) }}"><i class = 'bi bi-pencil-square'></i></a>
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="user" value="{{ ($value->id) }}">
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

@endsection