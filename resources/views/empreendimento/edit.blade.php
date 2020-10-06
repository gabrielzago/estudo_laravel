@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erro!</strong> Verifique os campos.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('empreendimento.update', $empreendimento->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nome:</strong>
                    <input type="text" name="nome" value="{{ $empreendimento->nome }}" class="form-control" placeholder="Nome">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Estado:</strong>
                    <select name="estado_id" id="estado_id" class="form-control" onchange="getCidades()">
                      @foreach($estado as $item)
                        <option value="{{ $item->id }}" {{$item->id == $empreendimento->estado_id ? 'selected' : ''}}>{{ $item->nome }}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cidade:</strong>
                    <select name="cidade_id" id="cidade_id" class="form-control">
                        @foreach($cidade as $item)
                            <option value="{{ $item->id }}" {{$item->id == $empreendimento->cidade_id ? 'selected' : ''}}>{{ $item->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Valor m²:</strong>
                    <input type="text" name="valor_m2" class="form-control formata_moeda" placeholder="Valor do m²" value="{{ $empreendimento->valor_m2 }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Entrega:</strong>
                    <input type="date" name="data_entrega" class="form-control" placeholder="Entrega" value="{{ $empreendimento->data_entrega }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </div>

    </form>
@endsection