<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdealNegativeSolution extends Model
{
    use HasFactory;

    public $table = 'ideal_negative_solution';

    public $fillable = [
        'value',
        'alternative_id'
    ];
}
