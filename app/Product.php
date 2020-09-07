<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'body', 'price', 'slug'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'products_categories');
    }

    public function photos()
    {
        return $this->hasMany(ProductPhoto::class, 'products_photos');
    }
}
