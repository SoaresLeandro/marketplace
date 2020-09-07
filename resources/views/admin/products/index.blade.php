@extends('layouts.app')

@section('content')
<h1 class="text-center">Produtos</h1>
<a href="{{ route('admin.products.create') }}" class="btn btn-success ml-auto my-2">Novo Produto</a>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="btn btn-sm btn-secondary">Editar</a>
                        <form style="display: inline;" action="{{ route('admin.products.destroy', ['product' => $product->id]) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}    
@endsection