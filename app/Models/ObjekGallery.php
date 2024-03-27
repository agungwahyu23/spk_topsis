<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjekGallery extends Model
{
    use HasFactory;

    public $table = 'objek_gallery';

    public $fillable = [
        'objek_id',
        'title',
        'image'
    ];

    protected $casts = [
        'title' => 'string',
        'image' => 'string'
    ];

    public static $rules = [
        'title' => 'nullable',
        'image' => 'nullable'
    ];

    public function objek()
    {
        return $this->belongsTo(Objek::class, 'objek_id', 'id');
    }
}
