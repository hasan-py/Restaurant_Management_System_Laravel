<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\User;

class ProfileController extends Controller
{
   function getProfile($username){
		$userDetails = User::where('username','=',$username)->first();
		return view('profile.profile',["user"=>$userDetails]);
   }

   function editProfile(Request $request){
   		$name = $request->name;
   		if($request->profile_pic){
			
			// Delete Exists file
			if($request->oldpic != "/img/user.png"){
				$oldPicPath = public_path().str_replace("/","\\",$request->oldpic);;
				File::delete($oldPicPath);
			}

   			$imageName = "./img/profile_pic/".time().'.'.$request->profile_pic->getClientOriginalExtension();
  			$request->profile_pic->move(public_path("/img/profile_pic"), $imageName);
 
  			$user = User::find($request->input('id'));
  			$user->name = $name;
  			$user->profile_pic = $imageName;
  			$user->updated_at = date("Y-m-d h:i:sa");
            $user->save();

			Session()->put('name',$name);
            Session()->flash('message',"Profile updated successfully.");
            return redirect('profile/'.$request->input('username'));

   		}else{
        	$user = User::find($request->input('id'));
  			$user->name = $name;
  			$user->updated_at = date("Y-m-d h:i:sa");
            $user->save();

			Session()->put('name',$name);
            Session()->flash('message',"Profile updated successfully.");
            return redirect('profile/'.$request->input('username'));
   		}
		
   }
}
