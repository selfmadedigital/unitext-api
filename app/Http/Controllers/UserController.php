<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = User::firstOrFail()->where('username', $request->input('username'))->where('password', $request->input('password'));

        return response()->json($user, 200);
    }
}
