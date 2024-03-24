<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IdealPositiveSolution extends Model
{
    use HasFactory;

    public $table = 'ideal_positif_solution';

    public $fillable = [
        'value',
        'alternative_id'
    ];
}
