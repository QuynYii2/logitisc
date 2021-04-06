<?php

namespace App\Interfaces;

interface OrderDetailInterface extends AbstractInterface {
    function statistical();
    function statisticaldate($restaurants, $days, $months, $years, $update_at);
    function statisticalrestaurant($restaurants);
}
