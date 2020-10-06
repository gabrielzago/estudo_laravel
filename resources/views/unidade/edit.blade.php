@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar - Unidade</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('unidade.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('unidade.update', $unidade->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome apartamento:</strong>
                    <input type="text" name="nome_apartamento" value="{{ $unidade->nome_apartamento }}" class="form-control" placeholder="Nome apartamento">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Metragem:</strong>
                    <input type="number" class="form-control formata_moeda" name="metragem"
                        placeholder="metragem" value="{{ $unidade->metragem }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Empreendimento:</strong>
                    <select name="empreendimento_id" id="empreendimento_id" class="form-control">
                      @foreach($empreendimento as $item)
                        <option value="{{ $item->id }}" {{$item->id == $unidade->empreendimento_id ? 'selected' : ''}}>{{ $item->nome }}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome da Torre:</strong>
                    <input type="text" name="nome_torre" class="form-control" value="{{ $unidade->nome_torre }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Andar:</strong>
                    <input type="number" name="andar" class="form-control" value="{{ $unidade->andar }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Alterar</button>
            </div>
        </div>

    </form>
@endsection