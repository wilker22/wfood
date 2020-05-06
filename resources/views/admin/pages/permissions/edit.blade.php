{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Editar a Permissão { $permission->name}")

@section('content_header')
    <h1>Editar o Permissão {{ $permission->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
          <div class="card-body">
                <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="POST">
                    @csrf
                    @method('PUT')

                    @include('admin.pages.permissions._partials.form')
                </form>
          </div>

        </div>
    </div>
@stop
