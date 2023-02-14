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
                        <h1 class="h4 text-gray-900 mb-4">Formulário Cliente</h1>
                        <!--divisão-->
                        <hr>
                        <!--init form-->
                        <form class="needs-validation" action="{{ route('cliente.store') }}"  method="POST" novalidate>
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" @error('name') is-invalid @enderror name="name" id="name"  placeholder="Nome e Sobrenome..." required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input id="rg" type="text" class="form-control form-control-user" @error('rg') is-invalid @enderror name="rg" maxlength="7" placeholder="RG..." pattern="[0-9]{1}-[0-9]{3}-[0-9]{3}"  required autocomplete="rg" autofocus>
                                    @error('rg')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="date" class="form-control form-control-user" @error('birth') is-invalid @enderror name="birth" id="birth"  placeholder="Data de nascimento" required autocomplete="birth" autofocus>
                                    @error('birth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" @error('phone') is-invalid @enderror maxlength="14" name="phone" id="phone" placeholder="Telefone..." required autocomplete="phone" autofocus>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" id="cpf"  class="form-control form-control-user"  @error('cpf') is-invalid @enderror name="cpf" maxlength="11" id="cpf" placeholder="CPF..." required autocomplete="cpf" autofocus>
                                     @error('cpf')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="email" class="form-control form-control-user" @error('email') is-invalid @enderror name="email" id="email" placeholder="Email..." required autocomplete="email" autofocus>
                                     @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user"  @error('state') is-invalid @enderror name="state" id="validation07" placeholder="Estado..." required autocomplete="state" autofocus>
                                     @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user"  @error('address') is-invalid @enderror name="address" id="address" placeholder="Endereço completo..." required autocomplete="address" autofocus>
                                     @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" pattern="\d{5}-\d{3}"  class="form-control form-control-user"  @error('cep') is-invalid @enderror name="cep" maxlength="9" id="cep" placeholder="CEP" required autocomplete="cep" autofocus>
                                     @error('cep')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

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