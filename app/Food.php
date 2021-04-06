<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';
    protected $fillable = array('name', 'price', 'menu_id');

    public function restaurants(){
        return $this->belongsToMany(Restaurant::class, 'food_restaurants', 'restaurant_id', 'food_id');
    }

}
