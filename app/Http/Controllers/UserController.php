<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class UserController extends Controller
{
    public function getSignup()
    {
    	return view('user.signup');
    }

    public function postSignup(Request $req)
    {
    	$this->validate($req, [
    			'email' => 'email|required|unique:users',
    			'password' => 'required|min:6'
    		]);

    	$user = new User([
    			'email' => $req->email,
    			'password' => bcrypt($req->password)
    		]);

    	$user->save();

    	Auth::login($user);

    	return redirect()->route('user.profile');
    }

    public function getSignin()
    {
    	return view('user.signin');
    }

    public function postSignin(Request $req)
    {
    	$this->validate($req, [
    			'email' => 'email|required',
    			'password' => 'required|min:6'
    		]);

    	if (Auth::attempt([
    	    			'email' => $req->email,
    	    			'password' =>$req->password
    	    		])) {

    		return redirect()->route('user.profile');
    	}
    	return redirect()->back();
    }

    public function getProfile()
    {
    	return view('user.profile');
    }

    public function getLogout()
    {
    	Auth::logout();
    	return redirect()->back();
    }
}
