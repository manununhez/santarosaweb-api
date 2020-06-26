<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySection extends Model
{
    protected $table = 'category_sections';

    protected $fillable = ['section_id','category_id'];

    public function section(){
        return $this->belongsTo(Section::class, 'section_id');
    } 

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
}
