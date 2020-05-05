{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Editar o Perfil { $profile->name}")

@section('content_header')
    <h1>Editar o Perfil {{ $profile->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
          <div class="card-body">
                <form action="{{ route('profiles.update', $profile->id) }}" class="form" method="POST">
                    @csrf
                    @method('PUT')

                    @include('admin.pages.profiles._partials.form')
                </form>
          </div>

        </div>
    </div>
@stop
