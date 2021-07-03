<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function addUser(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required'|'unique',
            'password'=>'required',
            'number'

        ]);
    }
}
