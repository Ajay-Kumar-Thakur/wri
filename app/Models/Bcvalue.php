<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Bcvalue extends Model
{
    use HasFactory;

    protected $fillable = [
        'newBtoC',  // We allow mass assignment for this field
    ];
}
