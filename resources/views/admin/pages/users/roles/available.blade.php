{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Cargos disponíveis para o Usuário: {$user->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">Usuários</a></li>
    </ol>

    <h1>Cargos Disponíveis para o Usuário: <strong> {{$user->name}} </strong>


@stop

@section('content')
    <div class="card">
        <div class="card-header">
                <form action="{{ route('users.roles.available', $user->id) }}" class="form form-inline" method="POST">
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
                        <form action="{{ route('users.roles.attach', $user->id) }}" method="post" class="form-control">
                            @csrf

                            @foreach($roles as $role)
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input" name="roles[]" id="roles" value="{{ $role->id}}">
                                </td>

                                <td>
                                    {{ $role->name }}
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
                {!! $roles->appends($filters)->links() !!}
            @else
                {!! $roles->links() !!}
            @endif

          </div>

        </div>
    </div>
@stop
