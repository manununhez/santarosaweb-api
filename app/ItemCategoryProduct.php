<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategoryProduct extends Model
{
    protected $table = 'item_category_products';

    protected $fillable = ['category_item_id','product_id'];
}
