<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
Use App\User;
Use Auth;

class SocialLoginController extends Controller
{

	public function __construct() {
		$this->middleware(['social', 'guest']);
	}

    public function redirect($service, Request $request) {
    	
    	return Socialite::driver($service)->redirect();

    }

    public function callback($service, Request $request) {
    	$serviceUser = Socialite::driver($service)->user();

    	$user = $this->getExistingUser($serviceUser, $service);
    	if (!$user) {
    		if ($service == "facebook") {
    			$user = User::create([
	    			'name' => $serviceUser->getName(),
	    			'email' => $serviceUser->getEmail(),
	    			'avatar' => $serviceUser->getAvatar(),
 	   			]);
    		} elseif($service == "google") {
    			$user = User::create([
	    			'name' => $serviceUser->getName(),
	    			'email' => $serviceUser->getEmail(),
	    			'avatar' => $serviceUser->getAvatar(),
	    		]);
    		}
    	}

    	if ($this->needsToCreateSocial($user, $service)) {
    		$user->social()->create([
    			'social_id' => $serviceUser->getId(),
    			'service' => $service,
    		]);
    	}


    	Auth::login($user, false);
    	return redirect()->intended();
    }

    protected function needsToCreateSocial(User $user, $service) {
    	return !$user->hasSocialLinked($service);
    }

    protected function getExistingUser($serviceUser, $service) {
    	return User::where('email', '=', $serviceUser->getEmail())->orWhereHas('social', function ($q) use ($serviceUser, $service) {
    		$q->where('social_id', $serviceUser->getId())->where('service', $service);
    	})->first();
    }
}
