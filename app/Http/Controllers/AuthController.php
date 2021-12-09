<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data= $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('my-app-token')->plainTextToken;
        
        $response = [
            'user' => $user,
            'token' => $token
        ];
    
         return response($response, 201);
    }

    // public function login(Request $request)
    // {
    //     $data= $request->validate([
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string'],
    //     ]);

    //     $user= User::where('email', $request->email)->first();
    //     // print_r($data);
    //         if (!$user || !Hash::check($data['password'], $user->password)) {
    //             return response([
    //                 'message' => ['These credentials do not match our records.']
    //             ], 404);
    //         }
        
    //          $token = $user->createToken('my-app-token')->plainTextToken;
        
    //         $response = [
    //             'user' => $user,
    //             'token' => $token
    //         ];
        
    //          return response($response, 201);
    // }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response(['message'=>'Logged out Successfully!!!']);
    }

}
