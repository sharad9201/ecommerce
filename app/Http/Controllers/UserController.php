<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    function register(Request $request){

        $user = User::create($request->all());
        return $user;
    }

    function login(Request $request){

        $user = User::where('email', $request->email)->first();
        if(!$user || Hash::check($request->password, $user->password)){
            return ["error" => "email or password not matched"];
        }

        return $user;
    }

}
