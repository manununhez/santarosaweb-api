<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    // Eloquent will also assume that each table has a primary key column named id. You may define a protected $primaryKey property to override this convention.
	protected $primaryKey = 'category_id'; // or null
    
    // If you wish to use a non-incrementing or a non-numeric primary key you must set the public $incrementing property on your model to false
    public $incrementing = false;

    protected $fillable = ['category_id', 'name', 'description', 'image_url'];

    public function items(){
        // return $this->belongsToMany(Category::class, 'category_sections');//get section per categories, without pagination
        return $this->hasMany(CategoryItemCategory::class, 'category_id');//get section per categories, with pagination
    }

    public function categorySection()
    {
        // return $this->belongsToMany(Category::class, 'category_sections');//get section per categories, without pagination
        return $this->belongsTo(CategorySection::class, 'category_id', 'category_id'); //get section per categories, with pagination
    }
}
