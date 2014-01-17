<?php

class AuthController extends BaseController {

	
    protected static $restful = true;

	public function __construct()
    {
        $this->beforeFilter('auth');
    }
 
    public function getLogout()
    {
        Auth::logout(); 
		return Redirect::to('guest/login')->with('flash_notice', 'Success! You have been disconnected.');
    }
	
	public function getNewmedia()
	{
		$user = User::find(Auth::user()->id);
		return View::make('newMedia', array(
				'user' => $user,
				'media' => NULL,
			)); 
	}
	
	public function getAddproduct($product_id = NULL)
	{
		$user = User::find(Auth::user()->id);
		if($product_id){
			$product = Product::find($product_id);
			if($product->status == 'free'){
				$product->status = 'blocked';
				$product->media_id = $user->media_id;
				$product->save();
				return Redirect::to('auth/home')->with('flash_notice', $product->name.' has been added to your selection'); 
			}
			else{
				return Redirect::to('auth/home')->with('flash_error', 'This product is not available'); 
			}			
		}
		else{
			return Redirect::to('auth/home')->with('flash_error', 'This product is not available'); 
		}
	}
	
	public function getRemoveproduct($product_id = NULL)
	{
		$user = User::find(Auth::user()->id);
		if($product_id){
			$product = Product::find($product_id);
			if($product->status == 'blocked' && $product->media_id == $user->media_id){
				$product->status = 'free';
				$product->media_id = NULL;
				$product->save();
				return Redirect::to('auth/home')->with('flash_notice', $product->name.' has been removed from your selection'); 
			}
			else{
				return Redirect::to('auth/home')->with('flash_error', 'This product is not yours'); 
			}			
		}
		else{
			return Redirect::to('auth/home')->with('flash_error', 'This product is not available'); 
		}
	}
	
	public function postNewmedia()
	{
		$v = Media::validate(Input::all()); 
        if ($v->passes()) {
            $media = new Media; 
            $media->name = Input::get('name'); 
            $media->intro_text = Input::get('intro_text'); 
            $media->full_text = Input::get('full_text'); 
            $media->save();
			//Update the user profile
			$user = User::find(Auth::user()->id);
			$user->media_id = $media->id;
			$user->save();
			
            return  Redirect::to('auth/home')->with('flash_notice', 'Your media is now defined!'); 
        } else {
            return Redirect::to('auth/newmedia')->withErrors($v)->withInput(Input::all()); 
        }
	}
	
	public function getHome()
    {
		$user = User::find(Auth::user()->id);
		if((Auth::user()->media_id)!=NULL){
		
			$media = Media::find(Auth::user()->media_id);
			$new_products = Product::where('status', '=', 'free')->orderBy('created_at', 'desc')->take(5)->get();
			$all_products = Product::where('status', '=', 'free')->orderBy('created_at', 'desc');
			$blocked_products = Product::where('status', '=', 'blocked')->where('media_id', '=', $media->id)->orderBy('created_at', 'desc')->get();
			
			$per_page = 5;
			$all_products = $all_products->paginate($per_page);
			
			//******
			$name = DB::connection('brands')->table('product')->where('id', '=', 1)->first();
			//******
			
			return View::make('media', array(
				'user' => $user,
				'media' => $media,
				'new_products' => $new_products,
				'all_products' => $all_products,
				'blocked_products' => $blocked_products,
				
				'name' => $name,
			)); 
		}
		else{ // Case pure admin with no media
			return View::make('media', array(
				'user' => $user,
				'media' => NULL,
			)); 
		}
    }
	

}