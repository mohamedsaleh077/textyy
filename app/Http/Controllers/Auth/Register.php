<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Register extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            "name" => "required|min:5|max:255|string",
            "email" => "required|email|max:255|string|unique:users",
            "password" => "required|max:255|min:8|string"
        ]);

        $user = User::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "password" => Hash::make($validated["password"])
        ]);

        Auth::login($user);

        return redirect("/posts")->with("success", "Welcome to Textyy");
    }
}
