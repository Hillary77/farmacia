@extends('layouts.header')

@section('content')
<!-- Content Row -->
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
  

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total (Anual)</div>
                        @foreach($dados as $value)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">R${{ number_format($value->total, 2, ',', '.') }}</div>
                    @endforeach
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-currency-dollar" style="font-size: 2rem; color: #95999c;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
      <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Em Estoque</div>
                        @foreach($stock as $value)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $value->stock }}</div>
                    @endforeach
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-calendar" style="font-size: 2rem; color: #95999c;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Saída estoque</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                               <div class="row no-gutters align-items-center">
                             @foreach($dados as $value)
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $value->quantity }}</div>
                    @endforeach
                    </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-clipboard2-data" style="font-size: 2rem; color: #95999c;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Tempo no sistema</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ date('d/m/Y H:i:s')}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="bi bi-stopwatch" style="font-size: 2rem; color: #95999c;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<!-- Content Row -->
<div class="row">

    <!-- Area Chart -->
    <div class="col-xl-8 col-lg-7">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Vendas Anuais</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <i class="bi bi-grid"></i>     
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-4 col-lg-5">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Ranking maiores vendas do mês</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                         aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Dropdown Header:</div>
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-pie pt-4 pb-2">
                    <canvas id="myPieChart"></canvas>
                </div>
                <div class="mt-4 text-center small">
                    <span class="mr-2">
                        <i class="bi bi-circle-fill text-primary"></i> 1°Melhor venda
                    </span>
                    <span class="mr-2">
                        <i class="bi bi-circle-fill text-success"></i> 2°Melhor venda
                    </span>
                    <span class="mr-2">
                        <i class="bi bi-circle-fill text-info"></i> 3°Melhor venda
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="font-size: 1.6rem; color: crimson;"><i class="bi bi-currency-exchange"></i>Ofertas especiais</h5>
                <p style="font-size: 1.2rem;" class="card-text">A Pague Menos preparou para você uma vitrine de ofertas. Confira a seleção de produtos em Medicamentos, Higiene, Beleza e muito mais, com descontos imperdíveis para você aproveitar no conforto da sua casa, com **entrega lá.</p>
                <a href="#" class="btn btn-outline-primary">Saiba mais</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="font-size: 1.6rem; color: crimson;"><i class="bi bi-currency-exchange"></i>Oferta especial</h5>
                <p style="font-size: 1.2rem;" class="card-text">Com suporte a texto embaixo, que funciona como uma introdução a um conteúdo adicional.</p>
                <a href="#" class="btn btn-primary">Adicionar</a>
            </div>
        </div>
    </div>
</div>

<hr>
<!-- Content Row -->
<div class="row">

    
    <div class="col-lg-12 mb-4">

        <!-- Approach -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">FUNCIONALIDADES DESSE SISTEMA</h6>
            </div>
            <div class="card-body">
                <p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce
                    CSS bloat and poor page performance. Custom CSS classes are used to create
                    custom components and custom utility classes.</p>
                <p class="mb-0">Before working with this theme, you should become familiar with the
                    Bootstrap framework, especially the utility classes.</p>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
//GRÁFICO AREA
var mes = JSON.parse('{!!json_encode($mes)!!}');
var data = JSON.parse('{!!json_encode($valor)!!}');

//GRÁFICO DOUGHNUT
var nome = JSON.parse('{!!json_encode($nome)!!}');
var total = JSON.parse('{!!json_encode($total)!!}');
</script>


<script src="{{ url('site/js/grafico/chart-area-demo.js') }}"></script>
<!--<script type="text/javascript">
var data = JSON.parse('{!!json_encode($valor)!!}');
</script>        -->

<script src="{{ url('site/js/grafico/chart-pie-demo.js') }}"></script>
@endsection


