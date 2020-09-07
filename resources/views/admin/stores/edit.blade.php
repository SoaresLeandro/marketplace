@extends('layouts.app')

@section('content')
    <h1>Nova Loja</h1>
    <form action="{{ route('admin.stores.update', ['store' => $store->id]) }}" method="post">
        @csrf
        @method("PUT")

        <div class="form-group">
            <label for="name">Loja</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $store->name }}">
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <input class="form-control" type="text" name="description" id="description" value="{{ $store->description }}">
        </div>
        
        <div class="form-group">
            <label for="phone">Telefone</label>
            <input class="form-control" type="text" name="phone" id="phone"  value="{{ $store->phone }}">
        </div>

        <div class="form-group">
            <label for="mobile_phone">Celular</label>
            <input class="form-control" type="text" name="mobile_phone" id="mobile_phone"  value="{{ $store->mobile_phone }}">
        </div>

        <div class="form-group">
            <label for="slug">Slug</label>
            <input class="form-control" type="text" name="slug" id="slug"  value="{{ $store->slug }}">
        </div>

        <div class="form-group col-sm-2">
            <div class="row">
                <button type="submit" class="form-control btn btn-primary">Salvar</button>
            </div>
        </div>

    </form>
@endsection