@extends('layouts.app')

@section('content')
    <h1>Nova Loja</h1>
    <form action="{{ route('admin.stores.store') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="name">Loja</label>
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
            <label for="phone">Telefone</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" {{ old('phone') }}>

            @error('phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="form-group">
            <label for="mobile_phone">Celular</label>
            <input type="text" class="form-control @error('mobile_phone') is-invalid @enderror" name="mobile_phone" id="mobile_phone" {{ old('mobile_phone') }}>

            @error('mobile_phone')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" {{ old('slug') }}>

            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
        </div>

        <div class="form-group col-sm-2">
            <div class="row">
                <button type="submit" class="form-control btn btn-primary">Enviar</button>
            </div>
        </div>

    </form>
@endsection