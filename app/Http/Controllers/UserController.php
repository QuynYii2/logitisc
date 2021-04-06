<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Interfaces\UserInterface;
use App\Interfaces\RoleInterface;
use App\Interfaces\RestaurantInterface;
use App\Restaurant;
use App\Table;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private $user, $role, $restaurant;

    public function __construct(UserInterface $user, RoleInterface $role, RestaurantInterface $restaurant)
    {
        $this->user = $user;
        $this->role = $role;
        $this->restaurant = $restaurant;
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role_id == 1){
            $user = $this->user->getAll();
            $role = $this->role->getAll();
        }
        else{
            $user = User::where('restaurant_id', Auth::user()->restaurant_id)->whereNotIn('role_id', [1,2])->get();
            $role = $this->role->getAll();
        }
        $restaurant = $this->restaurant->getAll();
        return view('auth/list', ['list_user' => $user, 'list_role' => $role, 'list_restaurant' => $restaurant]);
    }

    public function add(){
        $role = $this->role->getAll();
        $restaurant = $this->restaurant->getAll();
        return view('auth/add', ['list_role' => $role, 'list_restaurant' => $restaurant]);
    }

    public function save(UserRequest $request)
    {
        $input = $request->all();
        $attributes = [
            'name' => $input['name'],
            'email'  => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => $input['role'],
            'restaurant_id' => $input['restaurant']
        ];
        $user = $this->user->create($attributes);
        if ($user){
            return redirect()->route('user.list');
        }
    }

    public function edit(Request $request, $id){
        $user = $this->user->find($id);
        $role = $this->role->getAll();
        $restaurant = $this->restaurant->getAll();
        return view('auth/edit', ['list' => $user,'list_role' => $role, 'list_restaurant' => $restaurant]);
    }

    public function update(UserRequest $request){
        $input = $request->all();
        $id = $input['id'];
        $attributes = [
            'name' => $input['name'],
            'email'  => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' => $input['role'],
            'restaurant_id' => $input['restaurant']
        ];
        $user = $this->user->update($id, $attributes);
        if ($user){
            return redirect()->route('user.list');
        }
    }

    public function delete(Request $request, $id){
        $this->user-> delete($id);
        return redirect()->route('user.list');
    }

}
