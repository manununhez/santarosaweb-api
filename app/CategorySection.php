<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySection extends Model
{
    protected $table = 'category_sections';

    protected $fillable = ['section_id','category_id'];
}
