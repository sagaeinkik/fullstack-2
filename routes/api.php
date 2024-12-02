<?php

use App\Http\Controllers\FishController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json([
        "greeting" => "Hej och välkommen till mitt api! Det är gjort för Fullstacksutveckling med ramverk, på Mittuniversitet 2024.",
        "apiInfo" => "Dokumentation finns på https://github.com/sagaeinkik/fullstack-2",
        "endpoints" => [
            "get" => "api/fish",
            "get" => "api/fish/:id",
            "post" => "api/fish",
            "put" => "api/fish/:id",
            "delete" => "api/fish/:id"
        ]
    ]);
});

Route::resource("fish", FishController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
