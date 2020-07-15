<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Crypt;

class AuthController extends Controller
{
    
    function dashboard(){
        $id = Session()->get('id');
        $loggedInUser = User::where('id',$id)->get();
        Session::put("name",$loggedInUser[0]["name"]);
        Session::put("role",$loggedInUser[0]["role"]);
        // return $loggedInUser;
        return view('dashboard',["loggedInUser"=>$loggedInUser[0]]);
    }

    function postSignup(Request $request){
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
	    	$newUser->password = Crypt::encrypt($request->input('password'));
	    	$newUser->profile_pic = "./img/user.png";
            $newUser->role = "admin";
	        $newUser->created_at = date("Y-m-d h:i:s A");
	    	$newUser->save();
	    	Session()->flash('message',"Signup successfully. Please Login");
	    	return redirect()->route('login');
    	}else{
    		return redirect()->route('signup');
    	}
    }

    function postLogin(Request $request){
    	$user = User::where('email',$request->input('email'))->get();
    	if(count($user)>0){
    		$decryptPass = Crypt::decrypt($user[0]->password);
    		if($decryptPass == $request->input('password')){
    			Session()->put('username',$user[0]->username);
                Session()->put('name',$user[0]->name);
    			Session()->put('id',$user[0]->id);
    			return redirect()->route('dashboard');
    		}else{
    			Session()->flash('loginError',"Email or password doesn't match");
    			return redirect()->route('login');
    		}
    	}else{
			Session()->flash('loginError',"Email or password doesn't match");
			return redirect()->route('login');
    	}
    }

    function logout(){
        Session()->forget('username');
        Session()->forget('id');
        Session()->forget('name');
        Session::flush();
        Session()->flash('message',"Logut successfully");
        return redirect()->route('login');
    }
}
