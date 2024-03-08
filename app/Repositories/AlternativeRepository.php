<?php

namespace App\Repositories;

use App\Models\Alternative;
use App\Repositories\BaseRepository;

class AlternativeRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'code',
        'name'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Alternative::class;
    }
}
