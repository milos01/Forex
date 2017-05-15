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
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();   
    }   

	 /**
	 * Redirect user after service return token.
	 *
	 * @var string
	 */
    public function callback(SocialAccountService $service, $provider){
        $user = $service->createOrGetUser(Socialite::driver($provider));
     
        auth()->login($user);

        return redirect('home');
    }
}
