<?php

namespace App\Http\Controllers;
use App\Http\Requests\RestaurantRequest;
use App\User;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Interfaces\RestaurantInterface;

class RestaurantController extends Controller
{
    private $restaurants;

    public function __construct(RestaurantInterface $restaurants)
    {
        $this->restaurants = $restaurants;
    }

    public function index()
    {
        $restaurant = $this->restaurants->getAll();
        return view('restaurant/list', ['list' => $restaurant]);
    }

    public function add()
    {
        return view('restaurant/add');
    }

    public function save(RestaurantRequest $request)
    {
        $input = $request->all();
        $attributes = ['name' => $input['restaurant_name']];
        $restaurant = $this->restaurants->create($attributes);
        if ($restaurant){
            return redirect()->route('restaurant.list');
        }
    }

    public function edit(Request $request, $id){
        $restaurant = $this->restaurants->find($id);
        return view('restaurant/edit', ['list' => $restaurant]);
    }

    public function update(RestaurantRequest $request){
        $input = $request->all();
        $id = $input['id'];
        $attributes = ['name' => $input['restaurant_name']];
        $restaurant = $this->restaurants->update($id, $attributes);
        if ($restaurant){
            return redirect()->route('restaurant.list');
        }
    }

    public function delete(Request $request, $id){
        $this->restaurants-> delete($id);
        return redirect()->route('restaurant.list');
    }
}
