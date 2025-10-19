<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate(['email' => ['required', 'email'], 'password' => ['required', 'string'], 'device_name' => ['nullable', 'string', 'max:255'],]);
        $user = User::where('email', $credentials['email'])->first();
        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages(['email' => ['The provided credentials are incorrect.'],]);
        }
        $token = $user->createToken($credentials['device_name'] ?? 'api-token')->plainTextToken;
        return response()->json(['user' => $user, 'token' => $token, 'token_type' => 'Bearer',]);
    }
    public function destroy(Request $request)
    { // Revoke only the current token
        $request->user()->currentAccessToken()?->delete();
        return response()->noContent();
    }
}
