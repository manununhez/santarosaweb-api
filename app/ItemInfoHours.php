<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemInfoHours extends Model
{
    protected $table = 'item_info_hours';

    protected $fillable = ['work_days_description'];
}
