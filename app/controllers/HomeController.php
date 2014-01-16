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
	
	public function getContactus()
    {
		if (Auth::check()){
			$user = User::find(Auth::user()->id);
			$media = NULL;
			if(Auth::user()->media_id != NULL){
				$media = Media::find(Auth::user()->media_id);
			}			
			return View::make('contactus', array(
				'user' => $user,
				'media' => $media,
			)); 
		}
		else{
			return View::make('contactus');
		}
    }

	public function postContactus()
	{
		$rules = array(
			'email' => 'required|email',
			'title' => 'required|Alpha',
			'message' => 'required|Alpha'
		);
        $v = Validator::make(Input::all(), $rules);
		if ($v->passes()) {
			//TODO
            return  Redirect::to('contactus')->with('flash_notice', 'Your message has been sent!'); 
        } else {
            return Redirect::to('contactus')->withErrors($v)->withInput(Input::all()); 
        }
	}



}