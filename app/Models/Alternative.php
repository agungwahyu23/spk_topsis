<?php

namespace App\Models;

use App\Models\Criteria;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alternative extends Model
{
    use HasFactory;
    
    public $table = 'alternative';
    protected $primaryKey = "id";
    public $incrementing = "true";

    public $fillable = [
        'objek_id'
    ];

    protected $casts = [
        'objek_id' => 'string'
    ];

    public static $rules = [
        'objek_id' => 'nullable'
    ];

    public function objek()
    {
        return $this->belongsTo(Objek::class, 'objek_id', 'id');
    }

    public function analysis()
    {
        return $this->hasMany(Analysis::class);    
    }

    
}
