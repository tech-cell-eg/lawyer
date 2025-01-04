<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AuthController extends Controller implements HasMiddleware
{
    use ApiResponse;

    public static function middleware(): array
    {
        return [
            new Middleware("auth:sanctum", only: ["logout"]),
        ];
    }

    function register(SignupRequest $request) {
        $user = User::create($request->validated());
        $user["token"] = $user->createToken("User API Token")->plainTextToken;
        return $this->success("signup successfully", $user);
    }
    
    function login(LoginRequest $request) {
        $user = User::where("email", $request->email)->first();

        if (!$user || !password_verify($request->password, $user->password)) {
            return $this->failed("Password is incorrect.");
        } 

        $user["token"] = $user->createToken("login token")->plainTextToken;
        return $this->success("login successfully", $user);
    }

    function logout() {
        request()->user()->tokens()->delete();
        return $this->success("logout successfully");
    }

    function forgetPassword() {} // later
    function virefyEmail() {} // later
}
