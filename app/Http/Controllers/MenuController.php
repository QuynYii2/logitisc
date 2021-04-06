<?php

namespace App\Http\Controllers;

use App\Food;
use App\Interfaces\FoodInterface;
use App\Interfaces\MenuInterface;
use App\Interfaces\OrderDetailInterface;
use App\Interfaces\OrderInterface;
use App\Interfaces\RestaurantInterface;
use App\Interfaces\RoleInterface;
use App\Interfaces\TableInterface;
use App\Interfaces\UserInterface;
use App\Menu;
use App\Orderdetail;
use App\Restaurant;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    private $user, $role, $restaurant, $order, $table, $food, $orderDetail , $menu;

    public function __construct(
        UserInterface $user,
        RoleInterface $role,
        RestaurantInterface $restaurant,
        OrderInterface $order,
        TableInterface $table,
        FoodInterface $food,
        OrderDetailInterface $orderDetail,
        MenuInterface $menu

    )
    {
        $this->user = $user;
        $this->role = $role;
        $this->restaurant = $restaurant;
        $this->order = $order;
        $this->table = $table;
        $this->food = $food;
        $this->orderDetail = $orderDetail;
        $this->menu = $menu;
        $this->middleware('auth');
    }
    public function index()
    {
        $listMenu = $this->menu->getAll();
        $idRestaurant = Auth::user()->restaurant_id;
        $listRestaurant = $this->restaurant->listRestaurantbyid($idRestaurant);
        $listFoods = $listRestaurant[0]->foods;
        $status = array('Đang lên đơn' => 1, 'Đã thanh ' => 2);
        return view('menu/list', ['list_food' => $listFoods, 'list_menu' => $listMenu, 'list_restaurant' =>$listRestaurant]);
    }

    public function add(){
        $idRestaurant = Auth::user()->restaurant_id;
        $restaurant = $this->restaurant->listRestaurantbyid($idRestaurant);
        $foods = $restaurant[0]->foods;
        return view('menu/add', ['food' => $restaurant,  'foods' => $foods]);
    }

    public function save(Request $request)
    {
        $input = $request->all();
        $orderNew = $input['list'] ?? [];
        foreach ($orderNew as $valOD) {
            $foodOD = $this->food->find($valOD[0]);
            $tempData = [
                'food_name' => $foodOD->name,
                'price' => $foodOD->price,
                'restaurant_id' => Auth::user()->restaurant_id,
            ];
            $data[] = $tempData;
        }
        Menu::insert($data);
        return redirect()->route('menu.list');
    }

    public function edit(Request $request, $id){
        $menuEdit = $this->menu->find($id);
        $idRestaurant = Auth::user()->restaurant_id;
        $restaurant = $this->restaurant->listRestaurantbyid($idRestaurant);
        $foods = $restaurant[0]->foods;
        return view('menu/edit', ['data_menu' => $menuEdit, 'foods' => $foods]);
    }

    public function update(Request $request){
        $input = $request->all();
        $id = $input['id'];
        $orderNew = $input['list'] ?? [];
        foreach ($orderNew as $valOD) {
            $foodOD = $this->food->find($valOD[0]);
            $tempData = [
                'food_name' => $foodOD->name,
                'price' => $foodOD->price,
                'restaurant_id' => Auth::user()->restaurant_id,
            ];
        }
        $menu = $this->menu->update($id, $tempData);

        if ($menu){
            return redirect()->route('menu.list');
        }
    }

    public function delete(Request $request, $id){
        $this->menu-> delete($id);
        return redirect()->route('menu.list');
    }
}
