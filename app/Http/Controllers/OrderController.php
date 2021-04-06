<?php

namespace App\Http\Controllers;

use App\Food;
use App\FoodMaterial;
use App\FoodRestaurant;
use App\Http\Requests\UserRequest;
use App\Interfaces\FoodInterface;
use App\Interfaces\MaterialInterface;
use App\Interfaces\OrderDetailInterface;
use App\Interfaces\OrderInterface;
use App\Interfaces\TableInterface;
use App\Interfaces\UserInterface;
use App\Interfaces\RoleInterface;
use App\Interfaces\RestaurantInterface;
use App\Material;
use App\MaterialRestaurant;
use App\Order;
use App\Orderdetail;
use App\Restaurant;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    private $user, $role, $restaurant, $order, $table, $food, $orderDetail, $material;

    public function __construct(
            UserInterface $user,
            RoleInterface $role,
            RestaurantInterface $restaurant,
            OrderInterface $order,
            TableInterface $table,
            FoodInterface $food,
            OrderDetailInterface $orderDetail,
            MaterialInterface $material

        )
    {
        $this->user = $user;
        $this->role = $role;
        $this->restaurant = $restaurant;
        $this->order = $order;
        $this->table = $table;
        $this->food = $food;
        $this->orderDetail = $orderDetail;
        $this->material = $material;
        $this->middleware('auth');
    }

    public function index()
    {
        $user = $this->user->getAll();
        $role = $this->role->getAll();
        $restaurant = $this->restaurant->getAll();
        $order = $this->order->getAll();
        $table = $this->table->getAll();
        $status = array('Đã lên đơn' => 1, 'Đã thanh toán' => 2);
        return view('order/list', ['list_user' => $user, 'list_role' => $role, 'list_restaurant' => $restaurant, 'list' => $order, 'table' => $table, 'status' => $status]);
    }


    public function add(){
        $restaurant = Restaurant::where('id', Auth::user()->restaurant_id)->get();
        $foods = $restaurant[0]->foods;
        $data =[];
        foreach ($foods as $value){
            $idFood = $value->id;
            $data[] = $idFood;
        }
        $countMarerialbyrestaurantid = MaterialRestaurant::where('restaurant_id', Auth::user()->restaurant_id)
            ->get()->pluck('amount','material_id')->toArray();
        $countMaterialwithfood = FoodMaterial::where('food_id', $data)->get();
        $arr1 = [];
        foreach ($countMaterialwithfood as $data) {
            $arr1[$data->food_id][$data->material_id]  = $data->quantity;
        }
        $arr2 = [];
        foreach ($arr1 as $index => $value){
            foreach ($value as $key =>$data) {
                if (!isset($countMarerialbyrestaurantid[$key]) || $data >= $countMarerialbyrestaurantid[$key] ?? 0) {
                    $arr2[] = $index;
                }
            }
        };
        $table = Table::where([
            'restaurant_id' => Auth::user()->restaurant_id,
            'status' => 0,
        ])->get();
        return view('order/add', ['food' => $restaurant, 'table' => $table,  'foods' => $foods]);
    }

    public function save(Request $request)
    {
        $input = $request->all();
        $attributes = [
            'total_amount' => count($input['list']),
            'status' => 1,
            'process_by' => Auth::user()->id,
            'table_id' => $input['number_table']
        ];
        //lay material_id and quantity
        //lay so luong mon an * quantity
        //neu count trong material lon hon thì cho order
        $order = $this->order->create($attributes);
        //table affter order
        $idTable = $input['number_table'];
        $resultTable = Table::find($idTable);
        $data = [
            'name' => $resultTable['name'],
            'status' => 1,
            'restaurant_id' => $resultTable['restaurant_id']
        ];
        $this->table->update($idTable, $data);
        //end

        //materials after order
        $orderNew = $input['list'] ?? [];
        foreach ($orderNew as $valOD) {
            $foodMaterial = FoodMaterial::where('food_id', $valOD[0])->get();
            $quantityOld = $foodMaterial[0]->quantity;
            $amountMaterial = $quantityOld * $valOD[1];
            $itemMarerial = Material::find(6);
            $materialRestaurant  = MaterialRestaurant::where([
                'restaurant_id' => Auth::user()->restaurant_id,
                'material_id' => $foodMaterial[0]->material_id,
            ])->get();
            $dataMaterial = [
                'count' => $itemMarerial->count - $amountMaterial,
            ];
            Material::where(['id' => $foodMaterial[0]->material_id,])->update($dataMaterial);
            $dataMaterialRestaurant = [
                'amount' => $materialRestaurant[0]->amount - $amountMaterial,
            ];
            MaterialRestaurant::where([
                'restaurant_id' => Auth::user()->restaurant_id,
                'material_id' => $foodMaterial[0]->material_id,
            ])->update($dataMaterialRestaurant);
        }
        //end materials after order
        if ($order){
            $data = [];
            foreach ($input['list'] as $value){
                $priceFood = Food::find($value[0]);
                $tempData = [
                    'order_id' => $order->id,
                    'food_id' => $value[0],
                    'amount' => $priceFood->price,
                    'total_amount' =>$value[1]
                ];
                array_push($data, $tempData);
            }

            Orderdetail::insert($data);

            return redirect()->route('order.list');
        }
    }

    public function edit(Request $request, $id){
        $restaurantId =  Auth::user()->restaurant_id;
        $restaurant = Restaurant::where('id', $restaurantId)->get();
        $table = Table::where('restaurant_id', $restaurantId)->get();
        $foods = $restaurant[0]->foods;
        $order = $this->order->find($id);
        $roleId = Auth::user()->role_id;
        if ($order) {
            $orderDetail = $order->orderDetail;
            return view('order/edit', [
                'food' => $restaurant,
                'roleId' => $roleId,
                'table' => $table,
                'orderDetail' => $orderDetail,
                'foods' => $foods,
                'order' => $order
            ]);
        }
        else{
            return redirect()->route('order.list');
        }
    }

    public function update(Request $request){
        $input = $request->all();
        $id = $input['id'];
        $orderDetail = $input['orderDetail'];
        $orderNew = $input['list'] ?? [];
        $dataOrder = [
            'total_amount' => count($input['orderDetail']),
            'status' => $input['status'],
            'process_by' => Auth::user()->id,
        ];
        Order::query()->where([
            'id' => $id,
        ])->update($dataOrder);
        foreach ($orderDetail as $foodId => $quantity) {
            $food = $this->food->find($foodId);
            if (!$food) {
                continue;
            }

            $dataOrderdetail = [
                'amount' => $food->price,
                'total_amount' => $quantity,
            ];
            Orderdetail::query()->where([
                'order_id' => $id,
                'food_id' => $foodId,
            ])->update($dataOrderdetail);
        }
        if ($orderNew) {
            $data = [];

            foreach ($orderNew as $valOD) {
                $foodOD = $this->food->find($valOD[0]);
                $tempData = [
                    'order_id' => $id,
                    'food_id' => $valOD[0],
                    'amount' => $foodOD->price,
                    'total_amount' => $valOD[1],
                ];
                $data[] = $tempData;
            }
            Orderdetail::insert($data);
        }
        return redirect()->route('order.list');
    }

    public function delete(Request $request, $id){
        $this->user-> delete($id);
        return redirect()->route('order.list');
    }

}
