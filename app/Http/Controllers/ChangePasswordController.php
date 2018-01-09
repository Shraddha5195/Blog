<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class ChangePasswordController extends Controller
{ 
    public function index()
    {
    	return view('auth.passwords.change');
    }

    public function change(Request $request)
    {
    	$this->validate(request(), [
        'old_pass' => 'required',
        'new_pass' => 'required|string|min:6|confirmed',

    	]);

    	$user = Auth::user();

    	if (Hash::check($request->input('old_pass'), $user->password)) {
			$user->password = bcrypt($request->input('new_pass'));
			$user->save();
    	} 
        else
        {
           	return 'plese enter correct password';
        }
    	return redirect('login')->with(Auth::logout());

    }
}
