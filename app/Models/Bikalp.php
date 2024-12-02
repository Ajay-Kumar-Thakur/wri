<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bikalp extends Model
{
    use HasFactory;

    protected $fillable = [
        'handled',
        'source',
        'b-to-b',
        'b-to-c',
        'name',
        'email',
        'phone',
        'country',
        'location',
        'english',
        'score',
        'test',
        'lastqualification',
        'universityandboard',
        'passed',
        'gpa',
        'level',
        'university13',
        'course13',
        'intake13',
        'processing',
        'university14',
        'course14',
        'intake14',
        'university15',
        'course15',
        'additional-info',
        'intake15',
        'document',
        'initiated',
    ];
}
