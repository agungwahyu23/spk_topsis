<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objek extends Model
{
    public $table = 'objeks';

    public $fillable = [
        'code',
        'name',
        'thumbnail',
        'description'
    ];

    protected $casts = [
        'code' => 'string',
        'name' => 'string'
    ];

    public static $rules = [
        'code' => 'nullable',
        'name' => 'nullable'
    ];

    public function alternatif()
    {
        return $this->hasMany(Alternative::class);
    }

    public function gallery()
    {
        return $this->hasMany(ObjekGallery::class);
    }
}
