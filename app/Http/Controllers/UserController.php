<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Mail;
use Form;
use URL;

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
    			'password' => 'required|min:6',
    			'password_verify' => 'required|min:6|same:password',
    			'captcha' => 'required|captcha'
    		]);

		$verificationToken = str_random();
		
    	$user = new User([
			'email' => $req->email,
			'password' => bcrypt($req->password),
			'verification_token' => $verificationToken
    		]);
			
		// echo 'best match!!';
		if($user->save()){

			$verificationLink = route('user.verifyUser', ['id' => $user->id, 'token' => $verificationToken]);
			Mail::send('mails.userVerification', ['verificationLink' => $verificationLink], function($message) use($req){
                    $message->to($req->email)->subject('Email Verifikasi');
                    $message->from('muktikun@gmail.com', 'Roppa');
                }
            );

		}

    	// Auth::login($user);

    	return redirect()->route('user.askVerification');
	}
	
	public function askVerification(){

		return view('user.askVerification');
		
	}

	public function resendVerificationToken(Request $request){

		$this->validate($request, [
			'email' => 'email|required'
		]);

		$email = $request->email;

		$verificationToken = str_random();

		$user = User::where('email', $email)->first();
		$user->verification_token = $verificationToken;
		$user->save();

		$verificationLink = route('user.verifyUser', ['id' => $user->id, 'token' => $verificationToken]);
		Mail::send('mails.userVerification', ['verificationLink' => $verificationLink], function($message) use($email){
				$message->to($email)->subject('Email Verifikasi');
				$message->from('muktikun@gmail.com', 'Roppa');
			}
		);

		return redirect()->route('user.askVerification');

	}

	public function verifyUser(Request $request){

		$user_id = $request->id;
		$token = $request->token;

		$user = User::find($user_id);

		if($user->verification_token === $token){
			$user->verified = 1;
			$user->save();
		}

		return redirect()->route('product.index');

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
