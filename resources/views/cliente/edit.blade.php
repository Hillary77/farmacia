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
                        <h1 class="h4 text-gray-900 mb-4">Editar Cliente</h1>
                        <!--divisão-->
                        <hr>
                        <!--init form-->
                        <form class="needs-validation" action="{{ route('cliente.update', [$user->id])}}"  method="POST" novalidate>
                            @csrf
                            @method('PUT')
                            <div class="form-group row ">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="name" id="validation01"  placeholder="Nome Completo..." value="{{ $user->name }}" required>
                                    <div class="invalid-feedback">
                                        Por favor, digite um nome.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" name="rg" id="validation02" maxlength="7" placeholder="RG..." value="{{ $user->rg }}" required>
                                    <div class="invalid-feedback">
                                        Por favor, digite um RG.
                                    </div>
                                </div>
                            </div>

                            
                             <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="date" class="form-control form-control-user" name="birth" id="validation03" placeholder="Data de nascimento"  value="{{ $user->birth }}" required>
                                    <div class="invalid-feedback">
                                        Por favor, digite uma data de nascimento.
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" class="form-control form-control-user" maxlength="14" name="phone" id="validation04" placeholder="Telefone..." value="{{ $user->phone }}" required>
                                    <div class="invalid-feedback">
                                        Por favor, digite um telefone.
                                    </div>
                                </div>
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <input type="text" id="cpf"  class="form-control form-control-user" name="cpf" maxlength="11" maxlength="11" id="validation05" placeholder="CPF..." value="{{ $user->cpf }}" required>
                                    <div class="invalid-feedback">
                                        Por favor, digite um CPF.
                                    </div>
                                </div>
                            </div>
           

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="email" id="validation05"  placeholder="Email..." value="{{ $user->email }}" required>
                                    <div class="invalid-feedback">
                                        Por favor, digite um email.
                                    </div>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="state" id="validation06"  placeholder="Estado..." value="{{ $user->state }}" required>
                                    <div class="invalid-feedback">
                                        Por favor, digite um estado.
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" name="address" id="validation07" placeholder="Endereço completo..." value="{{ $user->address }}" required>
                                    <div class="invalid-feedback">
                                        Por favor, digite um endereço.
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" name="cep" id="validation08" maxlength="9" placeholder="CEP" value="{{ $user->cep }}" required>
                                    <div class="invalid-feedback">
                                        Por favor, digite um cep.
                                    </div>
                                </div>
                            </div>

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