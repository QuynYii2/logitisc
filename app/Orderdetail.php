<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $table = 'order_details';
    protected $fillable = array('order_id','food_id','amount','total_amount');
}
