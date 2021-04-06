<?php

namespace App\Interfaces;

interface TableInterface extends AbstractInterface {
    function getTableByRestaurantid($idRestaurant);
}
