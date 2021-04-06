<?php

namespace App\Http\Controllers;

use App\Interfaces\OrderDetailInterface;
use App\Interfaces\OrderInterface;
use App\Interfaces\RestaurantInterface;
use App\Interfaces\TableInterface;
use App\Order;
use App\Orderdetail;
use App\Restaurant;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $restaurant, $table, $order, $orderDetail;

    public function __construct(RestaurantInterface $restaurant, TableInterface $table, OrderInterface $order, OrderDetailInterface $orderDetail)
    {
        $this->restaurant = $restaurant;
        $this->table = $table;
        $this->order = $order;
        $this->orderDetail = $orderDetail;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $revenue = $this->orderDetail->statistical();
        $listRestaurant = Restaurant::all();
        return view('home', ['restaurant' => $listRestaurant, 'revenue' => $revenue]);
    }

    public function statistical(Request $request)
    {
        $restaurants = $request->restaurantId;
        $days = $request->day;
        $months = $request->month;
        $years = $request->year;
        if ($years != date('Y')){
            $update_at = $years.'-'.$months.'-'.$days;
            $revenue = $this->orderDetail->statisticaldate($restaurants, $days, $months, $years, $update_at);
            return response()->json($revenue);
        }
        if ($restaurants != 0){
            $revenue = $this->orderDetail->statisticalrestaurant($restaurants);
            return response()->json($revenue);
        }
    }
}
