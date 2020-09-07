@extends('layouts.app')

@section('content')

<h1 class="text-center">Lojas</h1>

@if (!$store)
    <a href="{{ route('admin.stores.create') }}" class="btn btn-success ml-auto my-2">Nova Loja</a>
@endif

    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Loja</th>
                <th>Total de Produtos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>            
            <tr>
                <td>{{ $store->id }}</td>
                <td>{{ $store->name }}</td>
                <td>{{ $store->products->count() }}</td>
                <td>
                    <a href="{{ route('admin.stores.edit', ['store' => $store->id]) }}" class="btn btn-sm btn-secondary">Editar</a>
                    <form style="display: inline;" action="{{ route('admin.stores.destroy', ['store' => $store->id]) }}" method="post">
                        @csrf
                        @method("DELETE")

                        <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                    </form>
                    
                </td>
            </tr>
        </tbody>
    </table>
 
@endsection