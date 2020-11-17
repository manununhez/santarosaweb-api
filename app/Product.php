<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Product extends Model implements Searchable
{
    protected $table = 'products';

    // Eloquent will also assume that each table has a primary key column named id. You may define a protected $primaryKey property to override this convention.
    protected $primaryKey = 'product_id'; // or null

    // If you wish to use a non-incrementing or a non-numeric primary key you must set the public $incrementing property on your model to false
    public $incrementing = false;

    protected $fillable = [
        'product_id', 'name', 'description', 'tag', 'image_url', 'image_url_2', 'image_url_3', 'price'
    ];

     public function getSearchResult(): SearchResult
     {
         $itemCategory = $this->itemCategoryProduct->categoryItem;
         $category = $itemCategory->categoryItemCategory->category;
         $section = $category->categorySection->section;

         $url = url("/section/".$section->section_id."/category/".$category->category_id."/item/".$itemCategory->item_category_id); //inicio

         return new SearchResult(
             $this,
             $this->name,
             $url
         );
    }

	public function itemCategoryProduct()
    {
        // return $this->belongsToMany(Category::class, 'category_sections');//get section per categories, without pagination
        return $this->belongsTo(ItemCategoryProduct::class, 'product_id', 'product_id'); //get section per categories, with pagination
    }
}
