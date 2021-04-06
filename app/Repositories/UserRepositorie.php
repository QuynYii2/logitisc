<?php
namespace App\Repositories;
use App\Interfaces\UserInterface;
use App\User;

class UserRepositorie extends EloquentRepository implements UserInterface {

    public function getModel(): string
    {
        return User::class;
    }

}
