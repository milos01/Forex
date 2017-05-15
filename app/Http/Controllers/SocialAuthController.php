<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Services\SocialAccountService;

class SocialAuthController extends Controller
{
	 /**
     * Redirect to Facebook service.
     *
     * @var string
     */
    public function redirect(){
        return Socialite::driver('facebook')->redirect();   
    }   

	 /**
	 * Redirect user after service return token.
	 *
	 * @var string
	 */
    public function callback(SocialAccountService $service){
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
     
        auth()->login($user);

        return redirect('home');
    }
}
