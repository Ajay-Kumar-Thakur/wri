<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Correct import


use Illuminate\Database\Eloquent\Model;

class Processing extends Model
{
    use HasFactory;

    protected $fillable = [

        'newProcessing',
    ];
}
