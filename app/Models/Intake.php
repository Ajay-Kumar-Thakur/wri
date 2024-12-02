<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Correct import


use Illuminate\Database\Eloquent\Model;

class Intake extends Model
{
    use HasFactory;

    protected $fillable = [
        'newIntake',  // We allow mass assignment for this field
    ];
}