<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
Route::get('password/reset/{token}', function ($token) {
    return View::make('auth.reset', array(
        'categories' => Categorie::all(),
        'actif' => -1,
        'token' => $token
    )); 
});

Route::post('password/reset/{token}', function () {
    $credentials = array('email' => Input::get('mail')); 
    return Password::reset($credentials, function ($user, $password) {
        $user->password = Hash::make($password); 
        $user->save(); 
        return Redirect::route('accueil')
                ->with('flash_notice', 'Votre nouveau mot de passe à bien été enregistré. Vous pouvez maintenant vous connecter.'); 
    })->withInput(); 
});
*/



Route::get('/', array('as' => 'home', function () {
    return Redirect::to('guest/inscription'); 
}));

//Route::post('admin/home', 'AdminController@getHome');

Route::get('contactus', 'HomeController@getContactus');
Route::post('contactus', 'HomeController@postContactus');


Route::controller('auth', 'AuthController');
Route::controller('guest', 'GuestController');
//Route::controller('admin', 'AdminController');

App::missing(function($exception)
{
    return 'Sorry, missing page!';
});

