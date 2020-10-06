@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Empreendimentos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('empreendimento.create') }}" title="Novo Emprendimento"> <i class="fas fa-plus-circle"></i>
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
            <th>Cidade</th>
            <th>Estado</th>
            <th>Valor m²</th>
            <th>Data da entrega</th>
            <th width="280px">Action</th>
        </tr>

        @foreach ($empreendimento as $dados)

            <tr>
                <td>{{ $dados->id }}</td>
                <td>{{ $dados->nome }}</td>
                <td>{{ $dados->cidade->nome }}</td>
                <td>{{ $dados->estado->nome }}</td>
                <td>{{ $dados->valor_m2 }}</td>
                <td>{{ $dados->data_entrega }}</td>
                <td>
                    <form action="{{ route('empreendimento.destroy', $dados->id) }}" method="POST">

                        <a href="{{ route('empreendimento.show', $dados->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('empreendimento.edit', $dados->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        <a href="/unidades/{{$dados->id}}">
                            Unidades
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
@endsection