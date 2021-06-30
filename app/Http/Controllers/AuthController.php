<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class AuthController extends Controller
{
    protected function generateAccessToken($user){
        $token = $user->createToken($user->email.'-'.now());
        return $token->accesToken;
    }

    public function register(Request $request){
        $request->validate([

        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return response()->json($user);
    }
}
