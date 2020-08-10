<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use Exception;
use Socialite;
use Redirect;
use App\User;

use Illuminate\Support\Facades\Hash;

class SocialAuthController extends Controller
{

    public function redirect($service, Request $request)
    {
        session(['signUpUserType' => $request->query->get('userSignUpType')]);
        return Socialite::driver($service)->redirect();
    }

    public function callback($service)
    {
        try {

            $signUpUserType = session('signUpUserType');
            session()->forget('signUpUserType');

            if ($signUpUserType === 'buyer') {
                $roleId = 2;
            }

            if ($signUpUserType === 'seller') {
                $roleId = 3;
            }

            $user = Socialite::with($service)->user();

            //echo 'test'; echo '<pre>'; var_dump($service); var_dump($user);die;

            $finduser = User::where('email', $user->email)->first();
            if ($finduser) {
                $finduser->mail_verify=1;
                $finduser->phone_verify=1;
                $finduser->save();
                Auth::login($finduser);
                return redirect()->route('dashboard');

            } else {

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_id' => $roleId,
                    'mail_verify' => 1,
                    'phone_verify' => 1,
                    'password' => ''
                ]);

                Auth::login($newUser);

                return redirect('/home');
            }
        } catch (Exception $e) {
            //dd($e->getMessage());
            return redirect('/login');
        }
    }
}
