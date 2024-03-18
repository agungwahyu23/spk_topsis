<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdealNegative extends Model
{
    use HasFactory;

    public $table = 'ideal_negatif';

    public $fillable = [
        'value',
        'alternative_id',
        'criteria_id'
    ];
}
