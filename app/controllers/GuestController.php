<?php

class GuestController extends Controller {

	public function __construct()
    {
        $this->beforeFilter('guest');
        $this->beforeFilter('csrf', array('on' => 'post'));
    }

	public function getLogin()
    {
        return View::make('auth.login'); 
    }
	
	public function getForgot()
    {
        return View::make('auth.forgot'); 
    }
	
	public function getInscription()
    {
        return View::make('auth.inscription'); 
    }
	
	public function postLogin()
	{
		if(Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password'))) || Auth::attempt(array('email' => Input::get('username'), 'password' => Input::get('password')))) {
            return Redirect::to('auth/home')
                ->with('flash_notice', 'Success ! Welcome ' . Auth::user()->username . ' !' );
        }
        return Redirect::to('guest/login')->with('flash_error', 'The password and the email address you entered do not match . Want to try again?')->withInput(Input::except('password'));
	}
	 
	public function postForgot()
	{
		$v = User::validateMail(Input::all()); 
		if ($v->passes()) {
			return Redirect::to('guest/login')->with('flash_notice', 'A mail has been sent with your password!');
			//TODO
		/*
			return Password::remind(array('email' => Input::get('email')), function($m) {
                $m->subject('Votre nouveau mot de passe');
            })->with('flash_notice', 'Un mail vous a été envoyé, veuillez suivre ses indications pour renouveler votre mot de passe.'); 	
		*/
		} else {
			return Redirect::to('guest/forgot')->withErrors($v);
		}
	}
	
	public function postInscription()
	{
		$v = User::validate(Input::all()); 
        if ($v->passes()) {
            $user = new User; 
            $user->username = Input::get('username'); 
            $user->email = Input::get('email'); 
            $user->password = Hash::make(Input::get('password')); 
            $user->save(); 
            return  Redirect::to('guest/login')->with('flash_notice', 'Your account has been created!')->withInput(Input::only('username', 'password')); 
        } else {
            return Redirect::to('guest/inscription')->withErrors($v)->withInput(Input::only('username', 'email')); 
        }
	}

}