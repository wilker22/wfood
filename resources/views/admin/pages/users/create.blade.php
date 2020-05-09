{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Cadastrar Novo Usuário')

@section('content_header')
    <h1>Cadastrar Novo Usuário</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
          <div class="card-body">
                <form action="{{ route('users.store') }}" class="form" method="POST">
                    @csrf
                    @include('admin.pages.users._partials.form')
                </form>
          </div>

        </div>
    </div>
@stop
