{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Editar o Categoria { $category->name}")

@section('content_header')
    <h1>Editar o Categoria {{ $category->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
          <div class="card-body">
                <form action="{{ route('categories.update', $category->id) }}" class="form" method="POST">
                    @csrf
                    @method('PUT')

                    @include('admin.pages.categories._partials.form')
                </form>
          </div>

        </div>
    </div>
@stop
