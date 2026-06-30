<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index(string $id)
    {
        $userProfile = User::find($id);
        $posts = $userProfile->Post()->latest()->paginate(5);

        return view("user", ['profile' => $userProfile, 'posts' => $posts]);
    }
}
