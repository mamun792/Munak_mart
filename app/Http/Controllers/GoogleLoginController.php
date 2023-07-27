<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Mail\AccountCreatedNotification;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function Callback()
    {

        $generate_password = Str::random(8);
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Google Login Failed');
        }

        $oldUser = User::where('email', $user->email)->first();

        if ($oldUser) {
            Auth::login($oldUser);
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => bcrypt($generate_password),
                'phone' => '017',
                'role' => 'coustomer',
            ]);
            $info = [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $generate_password,
                'role' => 'coustomer',
            ];

            Mail::to($user->getEmail())->send(new AccountCreatedNotification($info));
            Auth::login($newUser);
        }

        return redirect('dashboard');
    }
}
