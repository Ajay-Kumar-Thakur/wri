<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Correct import


use Illuminate\Database\Eloquent\Model;

class PgIetel extends Model
{
    use HasFactory;

    protected $fillable = [
        'newPgIelts',  // We allow mass assignment for this field
    ];
}
