{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
    </ol>

    <h1>Perfis <a href="{{ route('profiles.create') }}" class="btn btn-dark">ADD <i class="fas fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
                <form action="{{ route('profiles.search') }}" class="form form-inline" method="POST">
                    @csrf
                    <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{  $filters['filter'] ?? ''}}">
                    <button type="submit" class="btn btn-dark"><i class="fas fa-filter"></i> Filtrar</button>
                </form>
            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th style="width: 300px;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($profiles as $profile)
                            <tr>
                                <td>
                                    {{ $profile->name }}
                                </td>

                                <td>
                                    {{--  <a href="{{ route('details.profile.index', $profile->url) }}" class="btn btn-info">Detalhes</a>  --}}
                                    <a href="{{ route('profiles.edit', $profile->id) }}" class="btn btn-info">Editar</a>
                                    <a href="{{ route('profiles.show', $profile->id) }}" class="btn btn-warning">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
          </div>
          <div class="card-footer">
            @if (isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif

          </div>

        </div>
    </div>
@stop
