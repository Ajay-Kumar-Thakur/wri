<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
         'source', 'handled', 'name', 'phone', 'university', 'intake', 'email', 'country', 'level', 'course', 'processing', 
        'english', 'gpa', 'passed', 'document', 'remarks', 'initiated', 'interview', 'visa', 'noc', 'fees', 'amount', 'scholarship', 'offer'
    ];

}
