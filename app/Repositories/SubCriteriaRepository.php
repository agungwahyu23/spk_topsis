<?php

namespace App\Repositories;

use App\Models\SubCriteria;
use App\Repositories\BaseRepository;

class SubCriteriaRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'criteria_id',
        'description',
        'value'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return SubCriteria::class;
    }
}
