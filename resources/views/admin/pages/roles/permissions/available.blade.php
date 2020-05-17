{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Permissões disponíveis para o Cargo: {$role->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('roles.index') }}">Cargos</a></li>
    </ol>

    <h1>Permissões Disponíveis para o Cargo: <strong> {{$role->name}} </strong>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
                <form action="{{ route('roles.search') }}" class="form form-inline" method="POST">
                    @csrf
                    <input type="text" name="filter" placeholder="Filtro" class="form-control" value="{{  $filters['filter'] ?? ''}}">
                    <button type="submit" class="btn btn-dark"><i class="fas fa-filter"></i> Filtrar</button>
                </form>
            <div class="card-body">
                <table class="table table-condensed">
                    <thead>
                        <tr>
                            <th width="50px"> # </th>
                            <th>Nome</th>

                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('roles.permissions.attach', $role->id) }}" method="post" class="form-control">
                            @csrf

                            @foreach($permissions as $permission)
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input" name="permissions[]" id="permissions" value="{{ $permission->id}}">
                                </td>

                                <td>
                                    {{ $permission->name }}
                                </td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="500">
                                @include('admin.includes.alerts')
                                <button type="submit" class="btn btn-success">Vincular</button>
                            </td>
                        </tr>



                        </form>
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
