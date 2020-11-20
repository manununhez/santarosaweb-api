<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Category extends Model implements Searchable
{
    protected $table = 'categories';

    // Eloquent will also assume that each table has a primary key column named id. You may define a protected $primaryKey property to override this convention.
    protected $primaryKey = 'category_id'; // or null

    // If you wish to use a non-incrementing or a non-numeric primary key you must set the public $incrementing property on your model to false
    public $incrementing = false;

    protected $fillable = ['category_id', 'name', 'description', 'image_url'];

    public function getSearchResult(): SearchResult
    {
        $values = collect();
        foreach ($this->items as $itemCategory) {
            $itemCategory->makeHidden(["id", "created_at", "updated_at", "item_category_id", "category_id"]);
            $item = $itemCategory->categoryItem;
            $item->makeHidden(["id", "created_at", "updated_at", "item_category_id"]);
            // $tmp->makeHidden(["created_at", "updated_at"]);
            $values->push($item);
        }

        
        $categorySection = $this->categorySection;
        $categorySection->makeHidden(["id", "created_at", "updated_at", "section_id", "category_id"]);

        $section = $categorySection->section;
        $section->makeHidden(["created_at", "updated_at"]);

        $this->makeHidden(["created_at", "updated_at"]);
        
        $url = route("subCategoriasXcategoria", [$section, $this]); //inicio

        //    $url = route("inicio", $this->name); //inicio
        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    public function items()
    {
        // return $this->belongsToMany(Category::class, 'category_sections');//get section per categories, without pagination
        return $this->hasMany(CategoryItemCategory::class, 'category_id'); //get section per categories, with pagination
    }

    public function categorySection()
    {
        // return $this->belongsToMany(Category::class, 'category_sections');//get section per categories, without pagination
        return $this->belongsTo(CategorySection::class, 'category_id', 'category_id'); //get section per categories, with pagination
    }
}
