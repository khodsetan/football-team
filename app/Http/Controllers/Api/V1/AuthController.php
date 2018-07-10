<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
class AuthController extends Controller
{
     public function login(Request $request) {
        if (isset($request->token)) {

            try {
                $user = JWTAuth::authenticate($request->token);
                if (!$user->id) {
                    $response = [
                        'response' => [
                            'success' => 'false',
                            'msg' => 'These credentials do not match our records.'
                    ]];
                    return response()->json($response);
                }
            } catch (JWTException $e) {
                $response = [
                    'response' => [
                        'success' => 'false',
                        'msg' => 'An error occured try again'
                ]];
                return response()->json($response);
            }
            $token = $request->token;
        } else {
//            return $request->all();
            $validator = \Validator::make($request->all(), [
                        'email' => 'required',
                        'password' => 'required'
                            ]);
            if ($validator->fails()) {
                $response = [
                    'response' => [
                        'success' => 'false',
                        'errors' => array_flatten($validator->messages()->toArray())
                ]];
                return response()->json($response);
            }

            $credentials = $request->only('email', 'password');

            try {
                if (!$token = JWTAuth::attempt($credentials)) {
                    $response = [
                        'response' => [
                            'success' => 'false',
                            'msg' => 'These credentials do not match our records.'
                    ]];
                    return response()->json($response);
                }
            } catch (JWTException $e) {
                $response = [
                    'response' => [
                        'success' => 'false',
                        'msg' => 'An error occured try again'
                ]];
                return response()->json($response);
            }
            $user = auth()->user();
        }
        $response = [
            'response' => [
                'success' => 'true',
                'user' => $user,
                'token' => $token,
        ]];
        return response()->json($response);
    }
}
