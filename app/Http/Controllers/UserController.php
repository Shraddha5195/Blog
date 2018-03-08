<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;

class UserController extends Controller
{
    public function profile(){
    	return view('auth.profile', array('user' => Auth::user()) );
    }

    public function update_avatar(Request $request){
         $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
        $user = Auth::user();
    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
       		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

    		
    		$user->avatar = $filename;
    		
    	}
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->gender = $request->input('gender');    
        $user->save();

    	return view('auth.profile', array('user' => Auth::user()) );

    }
}
