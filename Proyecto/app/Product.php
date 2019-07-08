<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // $product -> $category: a que categoria pertenece un producto en especifico (relaciones)

    public function category(){
        return $this->belongsTo(Category::class);
    }

      //$product->images

      public function images(){
        return $this->hasMany(ProductImage::class);
    }

    public function getFeaturedImageUrlAttribute(){

        $featuredImage = $this->images()->where('featured',true)->first();
        if(!$featuredImage)
            $featuredImage = $this->images()->first();



        return '/images/default.png';

    }

    public function getCategoryNameAttribute(){
        if ($this->category)
            return $this->category->name;

        return 'General';
    }

}
