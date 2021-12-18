<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Mail;
Use App\Mail\User\AfterRegister;


class UserController extends Controller
{
    public function login()
    {
        return view('auth.user.login');
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback()
    {
        $callback = Socialite::driver('google')->stateless()->user();
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'avatar' => $callback->getavatar(),
            'is_admin' => 0,
            'email_verified_at' => date('Y-m-d H:i:s', time())
        ];
        // $user = User::FirstOrCreate(['email' => $data['email']], $data);

        $user = User::whereEmail($data['email'])->first();
        if(!$user)
        {
            $user = User::create($data);
            Mail::to($user->email)->send(New AfterRegister($user));
        }
        Auth::login($user, true);
        return redirect(route('welcome'));
    }
}
