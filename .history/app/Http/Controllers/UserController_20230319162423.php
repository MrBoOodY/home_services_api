<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Models\User;
use Illuminate\Http\Request;

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
        $data = $request->validate([
            '   ' => 'email|required',
            'password' => 'required'
        ]);

        
        if (!auth()->attempt($data)) {
            return response(['error_message' => 'Incorrect Details. 
            Please try again']);
        }

        // $token = auth()->user()->createToken('API Token')->accessToken;

        // return response(['user' => auth()->user(), 'token' => $token]);
    }
}
