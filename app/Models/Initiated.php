<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Correct import


use Illuminate\Database\Eloquent\Model;

class Initiated extends Model
{
    use HasFactory;

    protected $fillable = [
        'newInitiated',  // We allow mass assignment for this field
    ];
}
