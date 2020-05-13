{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Editar a Mesa { $table->identify}")

@section('content_header')
    <h1>Editar a Mesa {{ $table->identify }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
          <div class="card-body">
                <form action="{{ route('tables.update', $table->id) }}" class="form" method="POST">
                    @csrf
                    @method('PUT')

                    @include('admin.pages.tables._partials.form')
                </form>
          </div>

        </div>
    </div>
@stop
