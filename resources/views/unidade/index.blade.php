@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Unidades</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('unidade.create') }}" title="Novo Emprendimento"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Metragem</th>
            <th>Empreendimento</th>
            <th>Torre</th>
            <th>Andar</th>
            <th width="280px">Ações</th>
        </tr>
        @foreach ($unidade as $dados)
            <tr>
                <td>{{ $dados->id }}</td>
                <td>{{ $dados->nome_apartamento }}</td>
                <td>{{ $dados->metragem }}</td>
                <td>{{ $dados->empreendimentos->nome }}</td>
                <td>{{ $dados->nome_torre }}</td>
                <td>{{ $dados->andar }}</td>
                <td>
                    <form action="{{ route('unidade.destroy', $dados->id) }}" method="POST">

                        <a href="{{ route('unidade.show', $dados->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('unidade.edit', $dados->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>

                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>

                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $unidade->links() !!}

@endsection