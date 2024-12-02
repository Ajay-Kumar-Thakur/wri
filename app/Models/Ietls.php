<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Correct import


use Illuminate\Database\Eloquent\Model;

class Ietls extends Model
{
    use HasFactory;

    protected $fillable = [
        'newIelts',  // We allow mass assignment for this field
    ];
}
