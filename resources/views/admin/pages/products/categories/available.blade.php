{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Categorias disponíveis para o Produto: {$product->name}")

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Produtos</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.categories', $product->id) }}">Categorias</a></li>
        <li class="breadcrumb-item active"><a href="{{ route('products.categories.available', $product->id) }}" class="active">Disponíveis</a></li>
    </ol>

    <h1>Categorias Disponíveis para o Produto: <strong> {{$product->title}} </strong>

@stop

@section('content')
    <div class="card">
        <div class="card-header">
                <form action="{{ route('products.categories.available', $product->id) }}" class="form form-inline" method="POST">
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
                        <form action="{{ route('products.categories.attach', $product->id) }}" method="post" class="form-control">
                            @csrf

                            @foreach($categories as $category)
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input" name="categories[]" id="categories" value="{{ $category->id}}">
                                </td>

                                <td>
                                    {{ $category->name }}
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
                {!! $categories->appends($filters)->links() !!}
            @else
                {!! $categories->links() !!}
            @endif

          </div>

        </div>
    </div>
@stop
