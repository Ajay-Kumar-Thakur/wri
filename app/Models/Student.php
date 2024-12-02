<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'source', 'initiated', 'processing', 'university', 'intake', 'offer'
    ];
}
