<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite ;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {

            $google_user = Socialite::driver('google')->stateless()->user();

            $finduser = User::where('google_id', $google_user->id)->first();

            if($finduser){

                Auth::login($finduser);

                return redirect('review');

            }else{
                $user = new User();
                $user->name = $google_user->name;
                $user->email = $google_user->email;
                $user->google_id = $google_user->id;
                $user->password=Hash::make("password");

                $user->save();
                Auth::login($user);

                return redirect('review');
            }

    }

}
