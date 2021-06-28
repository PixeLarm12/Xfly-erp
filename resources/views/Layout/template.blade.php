<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/compiler/bootstrap.css">
    <link rel="stylesheet" href="style/css/style.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/vanilla-masker/1.1.0/vanilla-masker.min.js"></script>

    <title>@yield('title')</title>
    
    
</head>



<body>

    <nav class="navbar navbar-fixed-top navbar-expand-lg navbar-dark " style="background-color: #181818;">

        <div class="container">

        <a class="navbar-brand"  href="/">
        <img src="src/img/xflylogo.png" style="width:120px; height:65px;">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSite">

            <ul class="navbar-nav mr-auto">

                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/registers">Cadastros</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/services">Serviços</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/drones">Drones</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/payments">Pagamentos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/products">Produtos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/users">Administradores</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/help">Ajuda</a>
                </li>

            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item">

                    @if(Auth::check())
                    <a class="nav-link" href="/users/{{Auth::user()->id}}/edit">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Bem-vindo, {{strstr(Auth::user()->name, " ", true)}}
                        </a>

                        <a  class="nav-link " href="/logout">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Sair
                        </a>
                    @endif

                    @if(Auth::check() != true)
                        <a  class="nav-link" href="/login/page">
                            Entrar
                        </a>
                    @endif
                </li>

            </ul>
        </div>
        </div>
    </nav>

    <div style="margin-bottom: 20px">
        @yield('content')
    </div>

        <footer id="RubyFooter" class="fixed-bottom" style="background-color:#181818">
            <div class="mb-0 mt-0">
                <img src="src/img/ruby.png" style="width:48px; height:48px;">
                <font color="white">Desenvolvido por Ruby © 2020</font>
            </div>
        </footer>

    <script src="jquery/dist/jquery.js"></script>
    <script src="popper.js/dist/umd/popper.js"></script>
    <script src="bootstrap/dist/js/bootstrap.js"></script>

</body>
</html>
