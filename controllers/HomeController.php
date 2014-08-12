<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}

	public function doLogin()
	{
		$rules=array(
			'Username' => 'required',
			'Password'=>'required|min:3',
			);
		$validator=Validator::make(Input::all(),$rules);

		if($validator -> fails()){
			print'validate fail';
			return Redirect::to('form')
			->withErrors($validator)
			->withInput(Input::except('Password'));
		}else{

			$userdata=array(
				'username'=>Input::get('Username'),
				'password'=>Input::get('Password')
			);

			if(Auth::attempt($userdata)){
				//echo 'success';
				return Redirect::to('profile');
			}else{

				echo 'login failed '.$userdata['username']."  ".$userdata['password'];
				//return Redirect::to('fail');
			} 	
		} 		
	}

	public function doRegister(){
		
		$rules=array(
			'username'=>'required|min:3',
			'pwd'=>'required|min:3',
			'pwd2'=>'required|same:pwd',
			'user_email'=>'required|email|unique:users,email',
			'full_name'=>'required',
			'terms'=>'required'
			);
		$error_msg=array(
			'same'=>'password must match',
			'min:3'=>'the minimal length is 3',
			'required'=>'This field is required',
			'email'=>'Not a valid eamil address',
			'email.unique'=>'This email address is exits'
		);
		$validator=Validator::make(Input::all(),$rules,$error_msg);
		if($validator->fails()){
			echo 'validator fail';
			$messages=$validator->messages();
			foreach($messages->all() as $message){
				echo $message;
			};
			return Redirect::to('register')->withErrors($validator)->withInput(Input::except('pwd','pwd2'));
		}
		else { //the the form is validated
			$username=Input::get('username');
			$email=Input::get('user_email');
			$password=Hash::make(Input::get('pwd'));
			$nickName=Input::get('full_name');
			$timestamp=(new DateTime())->format('Y-m-d H:i:s');
			//echo $timestamp;
			
			DB::table('users')->insertGetId(array(
				'username'=>$username,
				'nickname'=>$nickName,
				'email'=>$email,
				'password'=>$password,
				'created_at'=>$timestamp,
				'updated_at'=>$timestamp
				));
			//echo $password;
			//echo (Input::get('password'));
			return Redirect::to('thankyou');
		}
	}
}
