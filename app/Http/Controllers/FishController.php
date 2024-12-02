<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fish;

class FishController extends Controller
{
    //Hämta alla rader i databasen
    public function index()
    {
        return Fish::all();
    }

    //Lagra ny rad
    public function store(Request $request)
    {
        //validera
        $request->validate([
            "species" => "required|min:2|max:64",
            "lengthInCm" => "nullable|decimal:0,3",
            "weightInGrams" => "nullable|max:8",
            "released" => "required|boolean",
            "caughtWith" => "required|min:2|max:64"
        ]);

        //returnera med skapa
        return Fish::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
