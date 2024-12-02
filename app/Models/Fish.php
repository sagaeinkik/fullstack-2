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
        "lengthInCm" => "double",
        "weightInGrams" => "integer"
    ];

    public function getLengthInCmAttribute($value)
    {
        // Om det finns decimaler, avrunda till 3 decimaler
        if ($value != floor($value)) {
            return round($value, 3);
        }
        return $value;
    }
}
