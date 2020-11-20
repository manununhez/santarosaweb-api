<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class Section extends Model implements Searchable
{
    protected $table = 'sections';

    // Eloquent will also assume that each table has a primary key column named id. You may define a protected $primaryKey property to override this convention.
	protected $primaryKey = 'section_id'; // or null
    
    // If you wish to use a non-incrementing or a non-numeric primary key you must set the public $incrementing property on your model to false
    public $incrementing = false;

    protected $fillable = ['section_id', 'name', 'description', 'image_url'];

    public function getSearchResult(): SearchResult
    {
        $values = collect();
        foreach ($this->categories as $category) {
            $category->makeHidden(["id", "created_at", "updated_at", "category_id"]);
            $item = $category->category;
            $item->makeHidden(["id", "created_at", "updated_at", "item_category_id"]);
            // $tmp->makeHidden(["created_at", "updated_at"]);
            $values->push($item);
        }

        
        $this->makeHidden(["created_at", "updated_at"]);

        $url = route("categoriasXseccion", [$this]); //inicio

        //    $url = route("inicio", $this->name); //inicio
        return new SearchResult(
            $this,
            $this->name,
            $url
        );
    }

    public function categories(){
        // return $this->belongsToMany(Category::class, 'category_sections', 'section_id', 'category_id');//get section per categories, without pagination
        return $this->hasMany(CategorySection::class, 'section_id', 'section_id');//get section per categories, with pagination
    }
}
