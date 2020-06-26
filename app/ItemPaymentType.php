<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemPaymentType extends Model
{
    protected $table = 'item_payment_types';

    protected $fillable = ['category_item_id','payment_type_id'];
}
