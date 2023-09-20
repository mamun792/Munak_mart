<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Authenticate;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $request->authenticate();

        $request->session()->regenerate();

        $role = auth()->user()->role;
        // return redirect()->intended(RouteServiceProvider::HOME);
        if ($role) {
            switch ($role) {
                case 'admin':
                    return redirect()->intended('/dashboard');
                    break;

                case 'vendor':
                    return redirect()->intended('/dashboard');
                    break;

                default:
                    return redirect()->intended('/customer/dashboard');
                    break;
            }
        }

        //return redirect()->route('login')->with('error', 'Invalid credentials.');
    }





    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
