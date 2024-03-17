<?php

namespace App\Models;

use App\Models\Criteria;
use App\Models\Alternative;
use App\Models\SubCriteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Analysis extends Model
{
    use HasFactory;
    
    public $table = 'analysis';
    protected $primaryKey = "id";

    public $fillable = [
        'alternative_id',
        'criteria_id',
        'sub_criteria_id'
    ];

    protected $casts = [
        'alternative_id' => 'integer',
        'criteria_id' => 'integer',
        'sub_criteria_id' => 'integer'
    ];

    public static $rules = [
        'alternative_id' => 'nullable',
        'criteria_id' => 'nullable',
        'sub_criteria_id' => 'nullable'
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternative::class, 'alternative_id', 'id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Criteria::class, 'criteria_id', 'id');
    }

    public function subKriteria()
    {
        return $this->belongsTo(SubCriteria::class, 'sub_criteria_id', 'id');
    }
}
