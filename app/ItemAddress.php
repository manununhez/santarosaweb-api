<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemAddress extends Model
{
    protected $table = 'item_addresses';

    // Eloquent will also assume that each table has a primary key column named id. You may define a protected $primaryKey property to override this convention.
	protected $primaryKey = 'item_address_id'; // or null
    
    // If you wish to use a non-incrementing or a non-numeric primary key you must set the public $incrementing property on your model to false
    public $incrementing = false;

    protected $fillable = ['item_address_id', 'address_1', 'address_2', 'house_number', 'neighborhood', 
    'city', 'postal_code', 'coordinate_latitude', 'coordinate_longitude'];
}
