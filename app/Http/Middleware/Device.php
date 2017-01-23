<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use App\Role;
use App\UserRole;

class Device
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                error_log('user_not_found');
                return redirect()->back();
            }
        } catch (TokenExpiredException $e) {
            error_log('token_expired');
            return redirect()->back();
        } catch (TokenInvalidException $e) {
            error_log('token_invalid');
            return redirect()->back();
        } catch (JWTException $e) {
            error_log('token_absent');
            return redirect()->back();
        }

        $userroles = UserRole::where([['active', true], ['user_id', $user->id]])->pluck('role_id');
        $roleId = Role::where('name','Device')->first();
        if ($userroles->contains($roleId->id)) {
            return $next($request);
        } else {
            error_log('Access denied');
            return redirect()->back();
        }
    }
}
