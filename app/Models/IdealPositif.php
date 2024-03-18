<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdealPositif extends Model
{
    use HasFactory;

    public $table = 'ideal_positif';

    public $fillable = [
        'value',
        'alternative_id',
        'criteria_id'
    ];
}
