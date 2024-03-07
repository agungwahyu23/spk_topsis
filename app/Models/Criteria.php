<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    public $table = 'criteria';

    public $fillable = [
        'code',
        'criteria_name',
        'status'
    ];

    protected $casts = [
        'code' => 'string',
        'criteria_name' => 'string',
        'status' => 'integer'
    ];

    public static $rules = [
        'code' => 'nullable',
        'criteria_name' => 'nullable',
        'status' => 'nullable'
    ];

    
}
