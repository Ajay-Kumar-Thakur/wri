<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;  // Make sure this line is added

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'handled',
        'source',
        'name',
        'email',
        'phone',
        'country',
        'location',
        'english',
        'passed',
        'gpa',
        'level',
        'university',
        'course',
        'intake',
        'processing',
        'document',
        'initiated',
    ];
}
