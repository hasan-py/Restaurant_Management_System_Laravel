<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Session;
use Crypt;

class UserController extends Controller
{
    function allUser(Request $request){
        $ownId = Session::get('id');
        $users = User::select('id','username','name','email','profile_pic','role','created_at','updated_at')->where('id', '!=' , $ownId)->get();
        return view('users.all-user',["users"=>$users,"index"=>1]);
    }

    function addUser(Request $request){
        $validateData = $request->validate([
            "username"=> 'required| min:3 | max:255 | alpha_dash | unique:users,username',
            "name"=> 'required| min:3 | max:255 ',
            "email"=> 'required | email | unique:users',
            "password" => 'required | required_with:confirm_password| same:confirm_password',
            "confirm_password" => 'required | min:4 | max:255'
        ]);
        if($validateData){
            $newUser = new User;
            $newUser->name = $request->input('name');
            $newUser->username = $request->input('username');
            $newUser->email = $request->input('email');
            $newUser->role = $request->input('role');
            $newUser->password = Crypt::encrypt($request->input('password'));
            $newUser->profile_pic = "https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQ-DjoQ3H0LFCWXLurl6qeHzGnbox2_cJTAmg&usqp=CAU";
            $newUser->created_at = date("Y-m-d h:i:s A");
            $newUser->save();
            Session()->flash('message',"User created successfully.");
            return redirect()->route('all-user');
        }else{
            return redirect('user/add-user');
        }
    }

    function getEditUser($id){
        $userDetails = User::select('id','username','name','email','profile_pic','role')->find($id);
        return view('users.edit-user',["userDetails"=>$userDetails]);
    }

    function postEditUser(Request $request){
        $validateData = $request->validate([
            "name"=> 'required| min:3 | max:255 ',
        ]);
        if($validateData){
            $user = User::find($request->input('id'));
            $user->name = $request->input('name');
            $user->role = $request->input('role');
            $user->updated_at = date("Y-m-d h:i:sa");
            $user->save();
            Session()->flash('message',"User updated successfully.");
            return redirect()->route('all-user');
        }else{
            return redirect('user/edit-user/'.$request->input('id'));
        }
    }

    function deleteUser($id){
        $delete = User::find($id)->delete();
        if($delete){
            Session()->flash('message',"User Delete successfully.");
            return redirect()->route('all-user');
        }else{
            return redirect()->route('all-user');
        }
    }
}
