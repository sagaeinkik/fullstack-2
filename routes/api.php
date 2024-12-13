<?php

use App\Http\Controllers\FishController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json([
        "greeting" => "Hej och välkommen till mitt api! Det är gjort för Fullstacksutveckling med ramverk, på Mittuniversitet 2024.",
        "apiInfo" => "Dokumentation finns på https://github.com/sagaeinkik/fullstack-2",
        "endpoints" => [
            "Hämta alla rader" => "GET api/fish",
            "Hämta enskild rad" => "GET api/fish/:id",
            "Lägg till rad" => "POST api/fish",
            "Uppdatera rad" => "PUT api/fish/:id",
            "Radera rad" => "DELETE api/fish/:id"
        ]
    ]);
});

//Route som eventuellt kan hålla render vaken
Route::get('/test', function () {
    return response()->json(['Gick bra?' => 'Ja'], 200);
});

Route::resource("fish", FishController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
