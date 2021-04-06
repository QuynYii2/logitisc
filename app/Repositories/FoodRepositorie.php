<?php
    namespace App\Repositories;
    use App\Food;
    use App\Interfaces\FoodInterface;

    class FoodRepositorie extends EloquentRepository implements FoodInterface {

        public function getModel(): string
        {
            return Food::class;
        }
    }
