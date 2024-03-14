<?php

namespace App\Repositories;

use App\Models\Analysis;
use App\Repositories\BaseRepository;

class AnalysisRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'alternative_id',
        'criteria_id',
        'sub_criteria_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Analysis::class;
    }
}
