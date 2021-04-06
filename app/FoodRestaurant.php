<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class FoodRestaurant extends Model
{
    protected $fillable = [
        'food_id', 'restaurant_id'
    ];

}
