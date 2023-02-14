<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Farmácia</title>

        <link href="{{ url(mix('site/css/style.css')) }}" rel="stylesheet" type="text/css">
        <link href="{{ url(mix('site/css/fontawesome.css')) }}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link  href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" rel="stylesheet">
        <!--vite-->
        {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    </head>


    <body id="page-top">
        <div id="wrapper">
            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Menu - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                    <div class="sidebar-brand-icon rotate-n-5">
                        <i class="bi bi-hospital"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3">{{ Auth::user()->name }}<sup>{{ Auth::user()->id }}</sup></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0">

                <!-- Nav Item - painel -->
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Cadaastrar do menu -->
                <div class="sidebar-heading">
                    <i class="bi bi-plus-circle"></i>
                    Cadastros
                </div>

                <!--Nav Item - Produto Menu--> 

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link collapsed" data-toggle="collapse" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="bi bi-people"></i>
                        <span>Cliente</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('cliente.create') }}" submit();>Cadastrar</a>
                        <a class="dropdown-item" href="{{ route('cliente.index') }}" submit();>Registro</a>

                    </div>
                </li>

                <!--Nav Item - Produto Menu--> 

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" data-toggle="collapse" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="bi bi-basket3"></i>
                        <span>Produto</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('produto.create') }}" submit();>Cadastrar</a>
                        <a class="dropdown-item" href="{{ route('produto.index') }}" submit();>Registro</a>
                    </div>
                </li>

                <hr class="sidebar-divider">

                <div class="sidebar-heading">
                    <i class="bi bi-plus-circle"></i> 
                    Registros
                </div>
                <!-- Nav Item - Pedidos Menu -->

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" data-toggle="collapse" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <i class="bi bi-cart-check"></i>
                        <span>Vendas</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('venda.create') }}" submit();>Cadastrar</a>
                        <a class="dropdown-item" href="{{ route('venda.index') }}" submit();>Registro</a>
                    </div>
                </li>


                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"><i class="bi bi-code" style="font-size: 1.48rem; color: #b7b9cc;"></i></button>
                </div>

                <!-- Sidebar Message -->
                <div class="sidebar-card d-none d-lg-flex">
                    <p class="text-center mb-2"><strong>FARMÁCIA</strong> está sendo desenvolvido como meio didático no estágio para criar um sistema seguro, usando a framework Laravel 9!</p>
                    <a class="btn btn-success btn-sm" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRn2fU99aNJRNm5t_3wLBPnGVWGNN6MtWa5OGKCOQb_vNRffuJVYDpl0F9VlkfHrfzFmsg&usqp=CAU">Não clique aqui!</a>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <!--                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                                                    <i class="bi bi-chevron-compact-right"></i>
                                                </button>-->

                        <!-- Topbar Search -->
                        <form
                            class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                       aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="bi bi-search" style="color: white"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                    @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                    @endif

                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                    @endif
                                    @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    @endguest
                                </ul>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <main class="py-4">
                            @yield('content')
                        </main>

                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy; Website {{ date('Y')}}</span>
                            </div>
                        </div>
                    </footer>
                    <!-- End of Footer -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="bi bi-chevron-double-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            


            <script src="{{  url(mix('site/js/jquery.js'))}}"></script>
            <script src="{{  url(mix('site/js/bootstrap.bundle.js'))}}"></script>
            <script src="{{  url(mix('site/js/jquery-easing/jquery.easing.js'))}}"></script>
            <script src="{{  url(mix('site/js/sb-admin.js'))}}"></script>
            <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        </div>
    </body>

</html>

