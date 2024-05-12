<?php

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/', function () {
    return response()->json([
        'message' => 'success',
    ], 200);
});

// Route::get('/test', [Controller::class, 'index']);
Route::get('/test', [Controller::class, 'index']);
Route::post('/update', [Controller::class, 'update']);
Route::post('/update-v2', [Controller::class, 'updateBookTitle']);
