<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{

    protected $table = 'item_categories';

    // Eloquent will also assume that each table has a primary key column named id. You may define a protected $primaryKey property to override this convention.
	protected $primaryKey = 'item_category_id'; // or null
    
    // If you wish to use a non-incrementing or a non-numeric primary key you must set the public $incrementing property on your model to false
    public $incrementing = false;

    protected $fillable = [
        'item_category_id', 'name','description','address_1', 'address_2', 'house_number', 'neighborhood', 
        'city', 'postal_code', 'coordinate_latitude', 'coordinate_longitude','website', 'email', 'phone','image_url_icon', 
        'image_url_logo','image_url_1','image_url_2', 'image_url_3','delivery_available','info_hours_id','info_hours_opening',
        'info_hours_closing'
    ];

    public function products(){
        // return $this->belongsToMany(Category::class, 'category_sections');//get section per categories, without pagination
        return $this->hasMany(ItemCategoryProduct::class, 'item_category_id');//get section per categories, with pagination
    }
}
