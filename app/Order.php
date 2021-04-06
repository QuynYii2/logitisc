<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = array('total_amount','status','process_by','table_id');

    public function orderDetail(){
        return $this->hasMany(Orderdetail::class);
    }
}
