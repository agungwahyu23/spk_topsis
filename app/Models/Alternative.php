<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alternative extends Model
{
    public $table = 'alternative';

    public $fillable = [
        'objek_id'
    ];

    protected $casts = [
        'objek_id' => 'string'
    ];

    public static $rules = [
        'objek_id' => 'nullable'
    ];

    
}
