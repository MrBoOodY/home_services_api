<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Helpers\ResponseStatusCodes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use ValidatorHelper;
use Laravel\Passport\HasApiTokens;


class AuthController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */

    public function register(Request $request)
    {

        $rules = array(
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        );
        $validator = Validator::make($request->all(), $rules);
        // Check to see if validation fails or passes
        if ($validator->fails()) {
            return    ValidatorHelper::handleFailures($validator);
        }
        $data = $validator->validate();
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        $token = $user->createToken('API Token')->accessToken;
        $user['token'] = $token;

        return ResponseHelper::setResponse('registered successfully', $user);
    }

    /**
     * Display the specified resource.
     */
    public function login(Request $request)
    {

        $rules = array(
            'email' => 'email|required',
            'password' => 'required'
        );
        $validator = Validator::make($request->all(), $rules);
        // Check to see if validation fails or passes
        if ($validator->fails()) {
            return    ValidatorHelper::handleFailures($validator);
        }


        if (!auth()->attempt($validator->validate())) {
            return ResponseHelper::setError('invalid credentials', ResponseStatusCodes::$error_status_code);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;
        $user = auth()->user();
        $user['token'] = $token;

        return ResponseHelper::setResponse('registered successfully', $user);
    }
}
