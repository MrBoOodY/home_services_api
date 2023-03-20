<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Helpers\ResponseStatusCodes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use ValidatorHelper;

class UserController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $data['password'] = bcrypt($request->password);

        $user = User::create($data);

        $token = $user->createToken('API Token')->accessToken;

        return ResponseHelper::setResponse('registered successfully', [$user->compact(['token' => $token])]);
    }

    /**
     * Display the specified resource.
     */
    public function login(Request $request)
    {

        // Tell the validator that this file should be an image
        $rules = array(
            'email' => 'email|required',
            'password' => 'required'
        );
        $validator = Validator::validate($request->all(), $rules);

        if (!auth()->attempt($validator)) {
            return ResponseHelper::setError('invalid credentials', ResponseStatusCodes::$error_status_code);
        }

        // $token = auth()->user()->createToken('API Token')->accessToken;

        // return response(['user' => auth()->user(), 'token' => $token]);
    }
}
