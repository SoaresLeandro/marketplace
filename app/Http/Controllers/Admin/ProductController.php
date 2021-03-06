<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Store;
use App\Category;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userStore = auth()->user()->store;
        $products = $userStore->products()->paginate(4);

        return view('admin.products.index', compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all(['id', 'name']);
        
        return view('admin.products.create', compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();        
        $store = auth()->user()->store;

        $product = $store->products()->create($data);
        
        $product->categories()->sync($data['categories']);
        
        if ($request->hasFile('photos')) {
            $images = $this->uploadImages($request, 'image');

            $product->photos()->createMany($images);
        }

        flash("Produto criado com sucesso.")->success();
        return redirect()->route('admin.products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->findOrFail($id);
        $categories = Category::all(['id', 'name']);

        dd($product->photos);
        return view('admin.products.edit', compact(['product', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();

        $product = $this->product->find($id);
        $product->update($data);
        $product->categories()->sync($data['categories']);

        flash("Produto atualizado com sucesso.")->success();
        return redirect()->route('admin.products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->find($id);

        if ($product) {
            $product->delete();

            flash("Produto removido com sucesso")->success();
            return redirect()->route('admin.products.index');
        }
    }

    private function uploadImages(Request $request, $imageColumn)
    {
        $images = $request->file('photos');

        $uploadedImages = [];

        foreach ($images as $image) {
            $uploadedImages = [$imageColumn => $image->store('products', 'public')];
        }
        
        return $uploadedImages;
    }
}
