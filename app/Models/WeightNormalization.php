<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightNormalization extends Model
{
    use HasFactory;

    public $table = 'wight_normalization';

    public $fillable = [
        'value',
        'alternative_id',
        'criteria_id'
    ];
}
