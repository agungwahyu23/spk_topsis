<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCriteria extends Model
{
    public $table = 'sub_criteria';

    public $fillable = [
        'criteria_id',
        'description',
        'value'
    ];

    protected $casts = [
        'criteria_id' => 'integer',
        'description' => 'string',
        'value' => 'double'
    ];

    public static $rules = [
        'criteria_id' => 'nullable',
        'description' => 'nullable',
        'value' => 'nullable'
    ];

    
}
