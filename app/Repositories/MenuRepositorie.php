<?php
namespace App\Repositories;
use App\Interfaces\MenuInterface;
use App\Menu;

class MenuRepositorie extends EloquentRepository implements MenuInterface {

    public function getModel(): string
    {
        return Menu::class;
    }
}
