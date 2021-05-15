<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Login
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = \Auth::attempt($credentials);

        // Verification failed to return 401
        if (!$token) {
            return response([
                'status' => 'error',
                'message' => 'Unauthorized.'
            ], 401);
        }

        return ['token' => $token];
    }

    /**
     * Logout
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        \Auth::logout();
        // TODO
//        return $this->response->noContent();
    }
}
