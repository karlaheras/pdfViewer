<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;
class UserController extends Controller{

    public function index(){
        return view("user.index",["model"=>User::paginate(20)]);
    }

    public function create(){
        return view("user.create",["inputs"=>User::formColumns()]);
    }

    public function store(Request $request){
        $data = $request->validate(User::validateArray());
       
        $data["password"] = Hash::make($data["password"]);
       // $data["empresa_id"]=auth()->user()->empresa_id;
        $model = User::create($data);
        if($model){
            return redirect("/login");
        }
        return redirect("error");
    }

    public function edit(User $user){
        return view("user.update",["model"=>$user]);
    }
    
    public function update(Request $request, User $user){
        $data = $request->validate(User::updateValidateArray($user->id));
        if(isset($data["password"]) && $data["password"]){
            $data["password"] = Hash::make($data["password"]);
        }
        if($user->update($data)){
            return redirect("usuario/".$user->id);
        }
        return redirect("error");
    }

    public function show(User $user){
        return view("user.view",["model"=>$user]);
    }

    public function delete(User $user){
        if($user->canDelete()){
            $user->delete();
        }
        else{
            request()->session()->flash('data_msg', 'Registro en uso, no se puede eliminar');
            request()->session()->flash('data_type', 'danger');
            request()->session()->flash('data_title', 'Error');
        }
        return redirect("users");
    }
}
