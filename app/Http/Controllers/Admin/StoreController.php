<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Store;

class StoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('user.has.store')->only(['create', 'store']);
    }

    public function index()
    {
        // $stores = \App\Store::paginate(4);
        $store = auth()->user()->store;

        return view('admin.stores.index', compact(['store']));
    }

    public function create()
    {
        // $users = \App\User::all(['id', 'name']);

        return view('admin.stores.create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->all();
        
        // $user = \App\User::find($data['user']);
        $user = auth()->user();

        $user->store()->create($data);

        flash('Loja criada com sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

    public function edit($id)
    {
        $store = \App\Store::find($id);

        if ($store) {
            return view('admin.stores.edit', compact(['store']));
        }
    }

    public function update(StoreRequest $request, $id)
    {
        $data = $request->all();
        $store = \App\Store::find($id);

        if ($store) {
            $store->update($data);
        }

        flash('Loja alterada com sucesso')->success();
        return redirect()->route('admin.stores.index');
    }

    public function destroy($id)
    {
        $store = \App\Store::find($id);

        if ($store) {
            $store->delete();
        }

        flash('Loja removida com sucesso')->success();
        return redirect()->route('admin.stores.index');
    }
}
