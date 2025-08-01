<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:6',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    $token = $user->createToken('api_token')->plainTextToken;

    return response()->json([
        'user' => $user,
        'token' => $token,
    ]);
});

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json([
            'message' => 'Credenciales incorrectas'
        ], 401);
    }

    $token = $user->createToken('api_token')->plainTextToken;

    return response()->json([
        'user' => $user,
        'token' => $token,
    ]);
});



Route::middleware('auth:sanctum')->get('/perfil', function (Request $request) {
    return $request->user();
});