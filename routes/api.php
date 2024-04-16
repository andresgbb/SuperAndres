<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProviderController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
|
*/

Route::get('/csrf-token', function() {
    return response()->json(['csrf_token' => csrf_token()], 200);
});

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Unauthorized'], 401);
    }

    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json(['token' => $token], 200);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    //Rutas de Product
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}', [ProductController::class, 'show']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    //Rutas de Provider
    Route::get('/providers', [ProviderController::class, 'index']);
    Route::get('/providers/{id}', [ProviderController::class, 'show']);
    Route::post('/providers', [ProviderController::class, 'store']);
    Route::put('/providers/{id}', [ProviderController::class, 'update']);
    Route::delete('/providers/{id}', [ProviderController::class, 'destroy']);
});

// La siguiente ruta POST se colocará fuera del middleware 'auth:sanctum'








