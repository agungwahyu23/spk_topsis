<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objek extends Model
{
    public $table = 'objeks';

    public $fillable = [
        'code',
        'name'
    ];

    protected $casts = [
        'code' => 'string',
        'name' => 'string'
    ];

    public static $rules = [
        'code' => 'nullable',
        'name' => 'nullable'
    ];

    
}
