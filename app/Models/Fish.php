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
        "caughtWith",
        "comment"
    ];

    //Se till att enheter blir rätt typ
    protected $casts = [
        "lengthInCm" => "double",
        "weightInGrams" => "integer"
    ];
}
