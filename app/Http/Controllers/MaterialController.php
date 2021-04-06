<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialRequest;
use App\Interfaces\MaterialInterface;
use App\Interfaces\RestaurantInterface;
use App\Interfaces\RoleInterface;
use App\Interfaces\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MaterialController extends Controller
{
    private $user, $role, $restaurant, $material;

    public function __construct(UserInterface $user, RoleInterface $role, RestaurantInterface $restaurant, MaterialInterface $material)
    {
        $this->user = $user;
        $this->role = $role;
        $this->restaurant = $restaurant;
        $this->material = $material;
        $this->middleware('auth');
    }

    public function index()
    {
        $user = $this->user->getAll();
        $role = $this->role->getAll();
        $restaurant = $this->restaurant->getAll();
        $material = $this->material->getAll();
        return view('material/list', ['list_user' => $user, 'list_role' => $role, 'list_restaurant' => $restaurant, 'list_material' => $material]);
    }

    public function add(){
        $role = $this->role->getAll();
        $restaurant = $this->restaurant->getAll();
        return view('material/add', ['list_role' => $role, 'list_restaurant' => $restaurant]);
    }

    public function save(MaterialRequest $request)
    {
        $input = $request->all();
        $attributes = [
            'name' => $input['name'],
            'count'  => $input['count'],
        ];
        $material = $this->material->create($attributes);
        if ($material){
            return redirect()->route('material.list');
        }
    }

    public function edit(Request $request, $id){
        $material = $this->material->find($id);
        $role = $this->role->getAll();
        $restaurant = $this->material->getAll();
        return view('material/edit', ['list_role' => $role, 'list_restaurant' => $restaurant, 'list_material' => $material]);
    }

    public function update(MaterialRequest $request){
        $input = $request->all();
        $id = $input['id'];
        $attributes = [
            'name' => $input['name'],
            'count'  => $input['count'],
        ];
        $material = $this->material->update($id, $attributes);
        if ($material){
            return redirect()->route('material.list');
        }
    }

    public function delete(Request $request, $id){
        $this->material-> delete($id);
        return redirect()->route('material.list');
    }
}
