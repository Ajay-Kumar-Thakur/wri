<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Correct import


use Illuminate\Database\Eloquent\Model;

class Pte extends Model
{
    use HasFactory;

    protected $fillable = [
        'newpte',  // We allow mass assignment for this field
    ];
}
