@extends('layouts.app')

@section('content')
    <h1>Editar Produto</h1>
    <form action="{{ route('admin.products.update', ['product' => $product->id]) }}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Produto</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ $product->description }}">
        </div>

        <div class="form-group">
            <label for="price">Preço</label>
            <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{ $product->slug }}">
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" id="body" rows="3" class="form-control">{{ $product->body }}</textarea>
        </div>

        <div class="form-group">
            <label for="categories">Categorias</label>
            <select class="form-control" name="categories[]" id="categories" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        @if ($product->categories->contains($category))
                            selected
                        @endif>
                        {{ $category->name }}
                    </option>
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

    <hr>

    <div class="col-sm-12">
        <div class="row">
            @foreach ($product->photos as $photo)
                <div class="col-sm-4">
                    <img src="{{ asset('storage/') . $photo->image}}" alt="" class="img-fluid">
                </div>
            @endforeach
        </div>
    </div>
@endsection