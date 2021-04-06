<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaterialRestaurant extends Model
{
    protected $fillable = array('restaurant_id','material_id', 'amount');

    public function food(){
        return $this->belongsToMany(Food::class, 'food_material', 'material_id', 'food_id');
    }

}
