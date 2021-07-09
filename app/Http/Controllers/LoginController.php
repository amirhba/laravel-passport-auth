<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function login(LoginRequest $request)
    {
        $data = $request->validated();

        if(!AuthService::attempt($data))
            return response(['wrong email or password using auth service']);

        $access_token = Auth::user()->createToken('authToken')->accessToken;

        return response(['user' => Auth::user(),'token' => $access_token]);
    }

}
