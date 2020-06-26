<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryItemCategory extends Model
{
    protected $table = 'category_item_categories';

    protected $fillable = ['category_item_id','category_id'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    } 

    public function categoryItem(){
        return $this->belongsTo(ItemCategory::class, 'category_item_id');
    }
}
