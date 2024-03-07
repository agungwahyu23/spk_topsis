<?php

namespace App\Repositories;

use App\Models\Objek;
use App\Repositories\BaseRepository;

class ObjekRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Objek::class;
    }
}
