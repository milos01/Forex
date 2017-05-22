<?php

namespace App\Services;

use Laravel\Socialite\Contracts\Provider;
use App\SocialAccount;
use App\User;
use Carbon\Carbon;

class SocialAccountService
{
    protected $now;

    public function __construct(){
        $this->now = Carbon::now();
    }

    public function createOrGetUser(Provider $provider)
    {
        $providerUser = $provider->user();
        $providerName = class_basename($provider); 

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($providerUser->getId())
            ->first();
        if ($account) {
            return $account->user;
        } else {

            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $providerName
            ]);

            $user = User::whereEmail($providerUser->getEmail())->first();
            if (!$user) {

                $user = User::create([
                    'email' => $providerUser->getEmail(),
                    'role_id' => 2,
                    'first_name' => $providerUser->getName(),
                    'last_name' => 'test',
                    'avatar' => $providerUser->getAvatar(),
                    'country' => 'test',
                    'activated' => 1,
                    'password' => bcrypt(str_random()),
                    'trial_ends_at' => $this->now->addDays(15),
                ]);
            }

            $account->user()->associate($user);
            $account->save();
    
            return $user;
        }

    }
}