<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email|max:255|string",
            "password" => "required|max:255|min:8|string"
        ]);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended("/posts")->with("success", "welcome Back");
        }

        return back()->withErrors([
            'email' => 'These credentials do not match our records.'
        ])->onlyInput('email');
    }
}
