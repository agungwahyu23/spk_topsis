<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCriteria extends Model
{
    public $table = 'sub_criteria';
    protected $primaryKey = "id";
    public $incrementing = "true";

    public $fillable = [
        'criteria_id',
        'description',
        'value'
    ];

    protected $casts = [
        'criteria_id' => 'integer',
        'description' => 'string',
        'value' => 'double'
    ];

    public static $rules = [
        'criteria_id' => 'nullable',
        'description' => 'nullable',
        'value' => 'nullable'
    ];

    public function kriteria()
    {
        return $this->belongsTo(Criteria::class, 'criteria_id', 'id');
    }
}
