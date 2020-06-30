<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategoryProduct extends Model
{
    protected $table = 'item_category_products';

    protected $fillable = ['item_category_id','product_id'];

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    } 

    public function categoryItem(){
        return $this->belongsTo(ItemCategory::class, 'item_category_id');
    }
}
