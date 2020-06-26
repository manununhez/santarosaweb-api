<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{

    protected $table = 'item_categories';

    protected $fillable = ['name','description','address_item_id','website','phone','image_url',
        'delivery_available','info_hours_id','info_hours_opening','info_hours_closing'];

    public function products(){
        // return $this->belongsToMany(Category::class, 'category_sections');//get section per categories, without pagination
        return $this->hasMany(ItemCategoryProduct::class, 'category_item_id');//get section per categories, with pagination
    }
}
