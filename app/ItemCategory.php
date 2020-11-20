<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class ItemCategory extends Model implements Searchable
{

    protected $table = 'item_categories';

    // Eloquent will also assume that each table has a primary key column named id. You may define a protected $primaryKey property to override this convention.
	protected $primaryKey = 'item_category_id'; // or null
    
    // If you wish to use a non-incrementing or a non-numeric primary key you must set the public $incrementing property on your model to false
    public $incrementing = false;

    protected $fillable = [
        'item_category_id', 
        'name',
        'description',
        'address_1', 
        'address_2', 
        'house_number', 
        'neighborhood', 
        'city', 
        'postal_code', 
        'coordinate_latitude', 
        'coordinate_longitude',
        'website', 
        'email', 
        'phone',
        'whatsapp',
        'title_slider_1',
        'title_slider_2',
        'title_slider_3',
        'description_slider_1',
        'description_slider_2',
        'description_slider_3',
        'btn_text_slider_1',
        'btn_link_slider_1',
        'btn_text_slider_2',
        'btn_link_slider_2',
        'btn_text_slider_3',
        'btn_link_slider_3',
        'image_url_slider_1',
        'image_url_slider_2', 
        'image_url_slider_3',
        'image_url_icon', 
        'image_url_logo',
        'footer_title',
        'footer_description',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
        'product_type',
        'delivery_available',
        'info_hours_id',
        'info_hours_opening',
        'info_hours_closing'
    ];

    public function getSearchResult(): SearchResult{
        $values = collect();
        foreach ($this->products as $product) {
            // $product->makeHidden(["id", "created_at", "updated_at", "item_category_id", "product_id"]);
            $tmp = $product->product;
            // $tmp->makeHidden(["created_at", "updated_at"]);
            $values->push($tmp);
        }

        
        $categoryItemCategory = $this->categoryItemCategory;
         $categoryItemCategory->makeHidden(["id", "created_at", "updated_at", "category_id", "item_category_id"]);

         $category = $categoryItemCategory->category;
         $category->makeHidden(["created_at", "updated_at"]);

         $categorySection = $category->categorySection;
         $categorySection->makeHidden(["id", "created_at", "updated_at", "section_id", "category_id"]);

         $section = $categorySection->section;
         $section->makeHidden(["created_at", "updated_at"]);

         $this->makeHidden(["created_at", "updated_at"]);
         
        $url = route("productosXsubCategoria", [$section, $category, $this]); //inicio

    //    $url = route("inicio", $this->name); //inicio
        return new SearchResult(
            $this,
            $this->name,
            $url
        );
   }

    public function products(){
        // return $this->belongsToMany(Category::class, 'category_sections');//get section per categories, without pagination
        return $this->hasMany(ItemCategoryProduct::class, 'item_category_id');//get section per categories, with pagination
    }

    public function categoryItemCategory()
    {
        // return $this->belongsToMany(Category::class, 'category_sections');//get section per categories, without pagination
        return $this->belongsTo(CategoryItemCategory::class, 'item_category_id', 'item_category_id'); //get section per categories, with pagination
    }
}
