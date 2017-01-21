<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use App\SubRole;
use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

class AuthenticateController extends Controller
{
    public function authenticate(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)->first();

        if ($user) {
            $password_check = Hash::check($password, $user->password);
            if (!$password_check) {
                return response()->json(['error' => 'password is not correct'], 401);
            }

            try {
                if (!$token = JWTAuth::fromUser($user)) {
                    return response()->json(['error' => 'could_not_create_token'], 401);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }
        } else {
            return response()->json(['error' => 'user is not exist'], 401);
        }
        return response()->json(['token' => $token], 201);
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['error' => 'user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['error' => 'token_expired'], $e->getStatusCode());
        } catch (TokenInvalidException $e) {
            return response()->json(['error' => 'token_invalid'], $e->getStatusCode());
        } catch (JWTException $e) {
            return response()->json(['error' => 'token_absent'], $e->getStatusCode());
        }

        $subroles = SubRole::where('user_id', $user->id)->pluck('role_id')->toArray();

        $roles = Role::whereIn('id', $subroles)->get()->toArray();

        return response()->json(['user' => $user, 'roles' => $roles], 201);
    }
}
