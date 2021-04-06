<?php
namespace App\Repositories;
use App\Interfaces\MaterialInterface;
use App\Material;

class MaterialRepositorie extends EloquentRepository implements MaterialInterface {

    public function getModel(): string
    {
        return Material::class;
    }
}
