<?php

namespace App\Http\Controllers;

use App\Interfaces\RestaurantInterface;
use App\Interfaces\TableInterface;
use App\Restaurant;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TableController extends Controller
{
    private $table, $restaurant;

    public function __construct( TableInterface $table, RestaurantInterface $restaurant){
        $this->table = $table;
        $this->restaurant = $restaurant;
        $this->middleware('auth');
    }

    public function index(){
        if (Auth::user()->role_id == 1){
            $table = Table::all();
            $restaurant = Restaurant::all();
        }
        else{
            $idRestaurant = Auth::user()->restaurant_id;
            $table = $this->table->getTableByRestaurantid($idRestaurant);
            $restaurant = $this->restaurant->listRestaurantbyid($idRestaurant);
        }
        $status = array('0' => 'Bàn trống', '1' => 'Đã đặt', '2' => 'Đã có khách');
        return view('table/list', ['list_table' => $table, 'list_restaurant' => $restaurant, 'status' => $status]);
    }

    public function add(){
        $role_id = Auth::user();
        $restaurant = Restaurant::all();
        $idRestaurant = Auth::user()->restaurant_id;
        $restaurants = $this->restaurant->listRestaurantbyid($idRestaurant);
            return view('table/add', ['role_id' => $role_id, 'list_restaurant' => $restaurant, 'restaurants' =>$restaurants]);
    }
    public function save(Request $request)
    {
        $input = $request->all();
        foreach ($input as $value){
        }
        $attributes = [
            'name' => $input['list'][0][0],
            'restaurant_id' => $input['list'][0][1],
            'status' => $input['list'][0][2],
        ];
        $table = $this->table->create($attributes);
        if ($table){
            return redirect()->route('table.list');
        }
    }

    public function edit(Request $request, $id){
        $role_id = Auth::user();
        $table = $this->table->find($id);
        $restaurant = Restaurant::all();
        $restaurants = $this->restaurant->listRestaurantbyid(Auth::user()->restaurant_id);
        return view('table/edit', ['role_id' => $role_id, 'detail_table' => $table, 'list_restaurant' => $restaurant, 'restaurants' =>$restaurants]);
    }

    public function update(Request $request){
        $input = $request->all();
        $id = $input['id'];
        $attributes = [
            'name' => $input['list'][0][0],
            'restaurant_id' => $input['list'][0][1],
            'status' => $input['list'][0][2],
        ];
//        dd($attributes);
        $user = $this->table->update($id, $attributes);
        if ($user){
            return redirect()->route('table.list');
        }
    }

    public function delete(Request $request, $id){
        $this->table-> delete($id);
        return redirect()->route('table.list');
    }
}
