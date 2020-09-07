@extends('layouts.app')

@section('content')
    <h1>Novo Produto</h1>
    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Produto</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" {{ old('name') }}>

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" {{ old('description') }}>

            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Preço</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" {{ old('price') }}>

            @error('price')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" {{ old('slug') }}>
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" rows="3" class="form-control">{{ old('body') }}</textarea>
        </div>

        <div class="form-group">
            <label for="categories">Categorias</label>
            <select class="form-control" name="categories[]" id="categories" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="photos">Fotos</label>
            <input type="file" name="photos[]" id="photos" class="form-control" multiple>
        </div>

        <div class="form-group col-sm-2">
            <div class="row">
                <button type="submit" class="form-control btn btn-primary">Enviar</button>
            </div>
        </div>

    </form>
@endsection