<html>

<head>
    <title>Teste</title>

    <!-- Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="/js/jquery.maskMoney.js"></script>
    <script src="/js/geral.js"></script>
    
    <style>
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #f56905;
            color: white;
            text-align: center;
        }

        .menu{
            background: #f56905;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            margin-bottom: 10px;
        }

        .menu a{
            color: #fff;
            font-weight: 600;
        }
    </style>

</head>

<body>
    @section('sidebar')

    @show
    <div class="menu">
        <a href="{{ route('empreendimento.index') }}">
            Empreendimentos
        </a>

        <a href="{{ route('unidade.index') }}">
            Unidades
        </a>
    </div>

    <div class="container">
        @yield('content')
    </div>
    <div class="text-center footer">

        <h4>Estudo Laravel</h4>

    </div>
</body>
    <script type="text/javascript">
        $(document).ready(function(){ 
            $(".formata_moeda").maskMoney({showSymbol:true, symbol:"", decimal:"."}); 
        });
    </script>
</html>