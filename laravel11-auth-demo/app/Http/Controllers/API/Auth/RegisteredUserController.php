<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate(['name' => 'required|string|max:255', 'email' => 'required|email:filter|lowercase|unique:users,email', 'password' => ['required', 'confirmed', Password::defaults()], 'device_name' => 'nullable|string|max:255',]);
        $user = User::create(['name' => $validated['name'], 'email' => $validated['email'], 'password' => Hash::make($validated['password']),]);
        $token = $user->createToken($validated['device_name'] ?? 'api-token')->plainTextToken;
        return response()->json(['user' => $user, 'token' => $token, 'token_type' => 'Bearer',], 201);
    }
}
