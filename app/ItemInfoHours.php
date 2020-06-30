<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemInfoHours extends Model
{
    protected $table = 'item_info_hours';

    // Eloquent will also assume that each table has a primary key column named id. You may define a protected $primaryKey property to override this convention.
	protected $primaryKey = 'info_hours_id'; // or null
    
    // If you wish to use a non-incrementing or a non-numeric primary key you must set the public $incrementing property on your model to false
    public $incrementing = false;

    protected $fillable = ['info_hours_id', 'work_days_description'];
}
