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

    public function getSearchResult(): SearchResult{

         $this->makeHidden(["created_at", "updated_at"]);

         $itemCategoryProduct = $this->itemCategoryProduct;
         $itemCategoryProduct->makeHidden(["id", "created_at", "updated_at", "item_category_id", "product_id"]);

         $itemCategory = $itemCategoryProduct->categoryItem;
         $itemCategory->makeHidden(["created_at", "updated_at"]);

         $categoryItemCategory = $itemCategory->categoryItemCategory;
         $categoryItemCategory->makeHidden(["id", "created_at", "updated_at", "category_id", "item_category_id"]);

         $category = $categoryItemCategory->category;
         $category->makeHidden(["created_at", "updated_at"]);

         $categorySection = $category->categorySection;
         $categorySection->makeHidden(["id", "created_at", "updated_at", "section_id", "category_id"]);

         $section = $categorySection->section;
         $section->makeHidden(["created_at", "updated_at"]);

         $this->makeHidden(["created_at", "updated_at"]);
         
         $url = route("productosXsubCategoria", [$section, $category, $itemCategory]); //inicio
        // $url = route("inicio", $this->name); //inicio
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
