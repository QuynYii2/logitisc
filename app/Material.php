<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Material extends Model
{
    use SoftDeletes;
    protected $fillable = array('name','count');
    public function restaurant(){
        return $this->belongsToMany(Food::class, 'material_restaurants', 'restaurant_id', 'material_id');
    }
}
