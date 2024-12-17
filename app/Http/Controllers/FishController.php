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
        //validera: regex för max 7 tecken innan ett decimaltecken, och max 3 efteråt
        $request->validate([
            "species" => "required|string|min:2|max:64",
            "lengthInCm" => "nullable|regex:/^\d{1,7}(\.\d{0,3})?$/",
            "weightInGrams" => "nullable|integer|max_digits: 6",
            "released" => "required|boolean",
            "caughtWith" => "required|string|min:2|max:64",
            "comment" => "nullable|string|max:550"
        ]);

        //returnera med skapa
        return Fish::create($request->all());
    }

    //Hämta specifik rad
    public function show(string $id)
    {
        //Hitta fisk
        $fish = Fish::find($id);

        //Visa fisk om finns, annars felmeddelande
        if ($fish) {
            return $fish;
        } else {
            return response()->json(["errorMessage" => "Ingen rad hittades.."], 404);
        }
    }

    //Uppdatera fisk
    public function update(Request $request, string $id)
    {
        //validera
        $request->validate([
            "species" => "required|string|min:2|max:64",
            "lengthInCm" => "nullable|regex:/^\d{1,7}(\.\d{0,3})?$/",
            "weightInGrams" => "nullable|integer|max_digits: 6",
            "released" => "required|boolean",
            "caughtWith" => "required|string|min:2|max:64",
            "comment" => "nullable|string|max:550"
        ]);

        //Hitta fisk
        $fish = Fish::find($id);

        if ($fish) {
            //Uppdatera alla fält
            $fish->update($request->all());
            //Returnera nya fisken och meddelande
            return response()->json(["message" => "Rad uppdaterad!", "Fish" => $fish]);
        } else {
            //Felkod och felmeddelande
            return response()->json(["errorMessage" => "Ingen rad hittades.."], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //Hitta fisk
        $fish = Fish::find($id);

        if ($fish) {
            //Delete
            $fish->delete();

            //Returnera nya fisken och meddelande
            return response()->json(["message" => "Rad raderad!"]);
        } else {
            //Felkod och felmeddelande
            return response()->json(["errorMessage" => "Ingen rad hittades.."], 404);
        }
    }
}
