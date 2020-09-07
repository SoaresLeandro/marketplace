@extends('layouts.app')

@section('content')
<h1 class="text-center">Categorias</h1>
<a href="{{ route('admin.categories.create') }}" class="btn btn-success ml-auto my-2">Nova Categoria</a>
    <table class="table table-bordered table-striped table-dark">
        <thead>
            <tr>
                <th>#</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" class="btn btn-sm btn-secondary">Editar</a>
                        <form style="display: inline;" action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-sm btn-danger">Remover</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $categories->links() }}    
@endsection