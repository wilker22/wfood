{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Permissões do Perfil {$profile->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('profiles.index') }}">Perfis</a></li>
    </ol>

    <h1>Permissões do Perfil: <strong>{{$profile->name}}</strong>

    <a href="{{ route('profiles.permissions.available', $profile->id) }}" class="btn btn-dark">Nova Permissão <i class="fas fa-plus-square"></i></a></h1>
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
                        @foreach($permissions as $permission)
                            <tr>
                                <td>
                                         {{ $permission->name }}
                                </td>

                                <td>
                                    <a href="{{ route('profiles.permission.detach', [$profile->id, $permission->id]) }}" class="btn btn-danger">DESVINCULAR</a>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
          </div>
          <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif

          </div>

        </div>
    </div>
@stop
