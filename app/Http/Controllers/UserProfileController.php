<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index(string $id)
    {
        $userProfile = User::with('Post')->find($id);
        return view("user", ['profile' => $userProfile]);
    }
}
