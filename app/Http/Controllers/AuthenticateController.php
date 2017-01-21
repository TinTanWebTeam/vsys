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
        $user = User::first();
        if ($user) {
            try {
                if (!$token = JWTAuth::fromUser($user)) {
                    return response()->json(['error' => 'could_not_create_token'], 401);
                }
            } catch (JWTException $e) {
                return response()->json(['error' => 'could_not_create_token'], 500);
            }
        } else {
            return response()->json(['error' => 'invalid_credentials'], 401);
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
