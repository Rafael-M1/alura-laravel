<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController
{

    public function create() {
        return view("users.create");
    }

    public function store(Request $request) {
        $data = $request->except(["token"]);
        $data["password"] = Hash::make($data["password"]);
        $user = User::create($data);
        Auth::login($user);
        return to_route("series.index");
    }
}
