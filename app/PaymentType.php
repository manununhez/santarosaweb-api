<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $table = 'payment_types';

    // Eloquent will also assume that each table has a primary key column named id. You may define a protected $primaryKey property to override this convention.
	protected $primaryKey = 'payment_type_id'; // or null
    
    // If you wish to use a non-incrementing or a non-numeric primary key you must set the public $incrementing property on your model to false
    public $incrementing = false;

    protected $fillable = ['payment_type_id', 'name', 'description'];
}
