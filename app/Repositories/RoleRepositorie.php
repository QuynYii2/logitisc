<?php
namespace App\Repositories;
use App\Interfaces\RoleInterface;
use App\Role;

class RoleRepositorie extends EloquentRepository implements RoleInterface {

    public function getModel(): string
    {
        return Role::class;
    }

}
