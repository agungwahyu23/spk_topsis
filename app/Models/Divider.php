<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divider extends Model
{
    use HasFactory;

    public $table = 'divider';

    public $fillable = [
        'value',
        'criteria_id'
    ];
}
