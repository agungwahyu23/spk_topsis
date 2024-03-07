<?php

namespace App\Repositories;

use App\Models\Criteria;
use App\Repositories\BaseRepository;

class CriteriaRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'code',
        'criteria_name',
        'status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Criteria::class;
    }
}
