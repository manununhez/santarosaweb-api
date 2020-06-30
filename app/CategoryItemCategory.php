<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryItemCategory extends Model
{
    protected $table = 'category_item_categories';

    protected $fillable = ['item_category_id','category_id'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    } 

    public function categoryItem(){
        return $this->belongsTo(ItemCategory::class, 'item_category_id');
    }
}
