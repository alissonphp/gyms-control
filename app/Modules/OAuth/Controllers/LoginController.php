<?php

namespace App\Modules\OAuth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Users\Controllers\UserController;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;

/**
 * Class LoginController
 * @package App\Modules\OAuth\Controllers
 */

class LoginController extends Controller
{

    /**
     * @var JWTAuth
     */
    protected $jwt;
    /**
     * @var UserController
     */
    public $userController;


    /**
     * LoginController constructor.
     * @param JWTAuth $jwt
     * @param UserController $userController
     */
    public function __construct(JWTAuth $jwt, UserController $userController)
    {
        $this->jwt = $jwt;
        $this->userController = $userController;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email'    => 'required|email|max:255',
            'password' => 'required',
        ]);

        try {
            if (! $token = $this->jwt->attempt($request->only('email', 'password'))) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (JWTException $e) {
            return response()->json(['token_absent' => $e->getMessage()], $e->getStatusCode());
        }

        return response()->json(compact('token'));
    }

}