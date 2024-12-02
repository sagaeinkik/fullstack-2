<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    //Fillable
    protected $fillable = [
        "species",
        "lengthInCm",
        "weightInGrams",
        "released",
        "caughtWith"
    ];

    //Se till att enheter blir rätt typ
    protected $casts = [
        "lengthInCm" => "float",
        "weightInGrams" => "integer"
    ];
}
