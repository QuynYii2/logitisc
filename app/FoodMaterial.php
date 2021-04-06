<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FoodMaterial extends Model
{
    protected $fillable = array('food_id','material_id','quantity');
    public function food(){
        return $this->belongsToMany(Food::class, 'food_material', 'material_id', 'food_id');
    }
}
