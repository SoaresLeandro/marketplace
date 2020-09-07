@extends('layouts.app')

@section('content')
    <h1>Editar Categoria</h1>
    <form action="{{ route('admin.categories.update', ['category' => $category->id]) }}" method="post">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Categoria</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ $category->description }}">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{ $category->slug }}">
        </div>

        <div class="form-group col-sm-2">
            <div class="row">
                <button type="submit" class="form-control btn btn-primary">Enviar</button>
            </div>
        </div>


    </form>
@endsection