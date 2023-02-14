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
                        <h1 class="h4 text-gray-900 mb-4">Formulário Produto</h1>
                        <!--divisão-->
                        <hr>
                        <!--init form-->
                        <form class="needs-validation" action="{{ route('produto.store') }}"  method="POST" novalidate>
                            @csrf
                            <div class="form-group row ">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" @error('name_product') is-invalid @enderror name="name_product" id="name_product" placeholder="Nome do produto..." required autocomplete="name_product" autofocus>
                                     @error('name_product')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" @error('valor') is-invalid @enderror name="valor" id="valor" placeholder="Valor..." required autocomplete="valor" autofocus>
                                     @error('valor')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"  @error('description') is-invalid @enderror name="description" id="description" placeholder="Descrição do produto..." required autocomplete="description" autofocus>
                                 @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" @error('stock') is-invalid @enderror name="stock" id="stock" placeholder="Estoque..." required autocomplete="stock" autofocus>
                                     @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="file" class="form-control form-control-user" @error('image') is-invalid @enderror name="image" id="image" placeholder="Imagem" required autocomplete="image" autofocus>
                                     @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!--divisão-->
                            <hr>
                            <div class="text-center">
                                <button type = "submit" class = "btn btn-primary btn-user">Salvar</button>
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