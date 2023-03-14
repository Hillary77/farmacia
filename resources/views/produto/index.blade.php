@extends('layouts.header')
@section('content')

<div class="container-fluid">
    <!-- Titulo nesta página -->
    <h1 class="h3 mb-2 text-gray-800">Produtos e medicamentos</h1>

    <!-- Init tabela -->
    <div class="card shadow mb-4">
        <!-- informações do que possui na tabela dentro do card -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Registro dos medicamentos!</h6>
        </div>
        <!--init card-body-->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-striped table table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Produto</th>
                            <th>Descrição</th>
                            <th>Valor</th>
                            <th>Estoque</th>
                            <th>Imagem</th>
                            <th>Ação</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($produtos as $value)
                        <tr>
                            <th>{{ $value->id }}</th>
                            <td>{{ $value->name_product }}</td>
                            <td>{{ $value->description }}</td>
                            <td class="text-right">{{ 'R$' .number_format($value->valor, 2, ',', '.') }}</td>
                            <td>{{ $value->stock }}</td>
                            <td>
                                <a class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="{{ $value->name_product }}" data-bs-text="{{ $value->description }}" data-bs-img="{{ $value->image }}">
                                    <img src="{{ url("img/".$value->image) }}" style="width: 66px; height: 60px; "alt="..." class="img-thumbnail">
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('produto.destroy', $value->id)}}" method="POST">
                                    <a type="button" class="btn btn-outline-success btn-sm rounded-circle" href="{{ route('produto.edit',$value->id) }}"><i class = 'bi bi-pencil-square'></i></a>
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="item" value="{{ ($value->id) }}">
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


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Produto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            
            <div class="modal-body"></div><!-- comment -->
            
            <div class="row">
                <div class="col-md-2 ms-auto">
                    <img class="modal-img" style=" width: 497px; height: 475px;"> </div>
              
            </div>

            
            
            <hr>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type='text/javascript'>
    var exampleModal = document.getElementById('exampleModal');
    exampleModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget;
        // Extract info from data-bs-* attributes
        var recipient = button.getAttribute('data-bs-whatever');

        var text = button.getAttribute('data-bs-text');

        var img = button.getAttribute('data-bs-img');

        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = exampleModal.querySelector('.modal-title');
        var modalBody = exampleModal.querySelector('.modal-body');
        var modalImg = exampleModal.querySelector('.modal-img');

        modalTitle.textContent = recipient;
        modalBody.textContent = text;
        modalImg.src = 'img/' + img;

        // modalBody.value = recipient;
    });
</script>

@endsection
