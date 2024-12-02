<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Correct import


use Illuminate\Database\Eloquent\Model;

class PgPte extends Model
{
    use HasFactory;

    protected $fillable = [
        'newPgPte',  // We allow mass assignment for this field
    ];
}
