<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResultTopsis extends Model
{
    use HasFactory;

    public $table = 'result_topsis';

    public $fillable = [
        'nilai',
        'alternative_id'
    ];
}
