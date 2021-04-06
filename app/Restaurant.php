<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use SoftDeletes;

    protected $fillable = array('name');

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function foods(){
        return $this->belongsToMany(Food::class, 'food_restaurants', 'restaurant_id', 'food_id');
    }

    public function material(){
        return $this->belongsToMany(Food::class, 'material_restaurants', 'restaurant_id', 'material_id');
    }
}
