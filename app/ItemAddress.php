<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemAddress extends Model
{
    protected $table = 'item_addresses';

    protected $fillable = ['address_1', 'address_2', 'house_number', 'neighborhood', 
    'city', 'postal_code', 'coordinate_latitude', 'coordinate_longitude'];
}
