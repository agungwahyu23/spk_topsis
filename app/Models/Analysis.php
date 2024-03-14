<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    public $table = 'analysis';

    public $fillable = [
        'alternative_id',
        'criteria_id',
        'sub_criteria_id'
    ];

    protected $casts = [
        'alternative_id' => 'integer',
        'criteria_id' => 'integer',
        'sub_criteria_id' => 'integer'
    ];

    public static $rules = [
        'alternative_id' => 'nullable',
        'criteria_id' => 'nullable',
        'sub_criteria_id' => 'nullable'
    ];

    
}
