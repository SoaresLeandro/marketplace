@extends('layouts.app')

@section('content')
    <h1>Nova Categoria</h1>
    <form action="{{ route('admin.categories.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Categoria</label>
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
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" {{ old('slug') }}>
        </div>

        <div class="form-group col-sm-2">
            <div class="row">
                <button type="submit" class="form-control btn btn-primary">Enviar</button>
            </div>
        </div>

    </form>
@endsection