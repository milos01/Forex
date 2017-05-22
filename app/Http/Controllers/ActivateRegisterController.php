<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ActivationService;
use Illuminate\Foundation\Auth\RedirectsUsers;

class ActivateRegisterController extends Controller
{
	use RedirectsUsers;

	protected $activationService;

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService)
    {
        $this->activationService = $activationService;
    }
    public function activateUser($token){
    	// dd($this->activationService->activateUser($token));
        if ($user = $this->activationService->activateUser($token)) {
            auth()->login($user);
            return redirect($this->redirectPath())->with('mailInfo', 'Successfully activated email address!');
        }
        abort(404);
    }
}
