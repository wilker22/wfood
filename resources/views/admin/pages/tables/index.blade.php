{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Mesas')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('tables.index') }}" class="active">Mesas</a></li>
    </ol>

    <h1>Mesas <a href="{{ route('tables.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
                <form action="{{ route('tables.search') }}" class="form form-inline" method="POST">
                    @csrf
                    <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{  $filters['filter'] ?? ''}}">
                    <button type="submit" class="btn btn-dark"><i class="fas fa-filter"></i> Filtrar</button>
                </form>
            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th style="width: 300px;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tables as $table)
                            <tr>
                                <td>{{ $table->identify }}</td>
                                <td>{{ $table->description }}</td>

                                <td>

                                    <a href="{{ route('tables.edit', $table->id) }}" class="btn btn-info">Editar</a>
                                    <a href="{{ route('tables.show', $table->id) }}" class="btn btn-warning">Ver</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
          </div>
          <div class="card-footer">
            @if (isset($filters))
                {!! $tables->appends($filters)->links() !!}
            @else
                {!! $tables->links() !!}
            @endif

          </div>

        </div>
    </div>
@stop
