<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatrixNormalization extends Model
{
    use HasFactory;

    public $table = 'matrix_normalization';

    public $fillable = [
        'value',
        'alternative_id',
        'criteria_id'
    ];
}
