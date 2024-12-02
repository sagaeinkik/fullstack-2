<?php

use App\Http\Controllers\FishController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/greeting', function () {
    return response()->json(["message" => "Hello World!"]);
});

Route::resource("fish", FishController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
