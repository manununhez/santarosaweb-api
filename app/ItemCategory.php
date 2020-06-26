<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{

    protected $table = 'item_categories';

    protected $fillable = ['category_id','name','description','address_item_id','website','phone','image_url',
        'delivery_available','info_hours_id','info_hours_opening','info_hours_closing'];
}
