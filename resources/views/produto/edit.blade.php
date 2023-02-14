@extends('layouts.header')

@section('content')

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <!--Titulo da página-->
                        <h1 class="h4 text-gray-900 mb-4">Editar Produto</h1>
                        <!--divisão-->
                        <hr>
                        <!--init form-->
                        <form class="needs-validation" action="{{ route('produto.update', [$item->id])}}"  method="POST" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-group row ">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="name_product" id="validation01" placeholder="Nome do produto..."  value="{{ $item->name_product }}" required>
                                    <div class="invalid-feedback">
                                        Por favor, digite o nome do produto.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" name="valor" id="validation02" placeholder="Valor..."  value="{{ $item->valor }}" required>
                                    <div class="invalid-feedback">
                                        Por favor, digite o valor do produto.
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="description" id="validation03" placeholder="Descrição do produto..."  value="{{ $item->description }}" required>
                                <div class="invalid-feedback">
                                    Por favor, digite a descrição do produto.
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="stock" id="validation04" placeholder="Estoque..." value="{{ $item->stock }}" required>
                                    <div class="invalid-feedback">
                                        Por favor, digite o estoque.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control form-control-user" name="image" id="validation05" placeholder="Imagem" value="{{ $item->image }}" required>
                                    <div class="invalid-feedback">
                                        Por favor, coloque uma imagem.
                                    </div>
                                </div>
                            </div>
                            <!--divisão-->
                            <hr>
                            <div class="text-center">
                                <button type = "submit" class = "btn btn-primary btn-user">Editar</button>
                            </div>
                        </form>
                        <!--fim form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection