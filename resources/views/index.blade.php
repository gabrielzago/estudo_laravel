@extends('layouts.app')

@section('content')

    <div class="geral_bloco">
        <a href="{{ route('empreendimento.index') }}">
            <div class="card_crud">
                Empreendimentos
            </div>
        </a>
        <a href="{{ route('unidade.index') }}">
            <div class="card_crud">
                Unidades
            </div>
        </a>
    </div>


    <style type="text/css">
        a, a:hover{
            text-decoration:none;
        }
        .geral_bloco{
            display: flex;
            align-items: center;
            justify-content: space-evenly;
            margin-top: 100px;
        }

        .card_crud{
            background: #f56905;
            min-width: 250px;
            height: 100px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 20px;
            font-weight: 600;
            -webkit-box-shadow: 2px 3px 19px 0px rgba(0,0,0,0.75);
            -moz-box-shadow: 2px 3px 19px 0px rgba(0,0,0,0.75);
            box-shadow: 2px 3px 19px 0px rgba(0,0,0,0.75);
            cursor: pointer;
        }

        .card_crud:hover{
            background: #d06112;
        }

    </style>

@endsection