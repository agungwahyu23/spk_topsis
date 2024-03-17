<?php

namespace App\Repositories;

use App\Models\Divider;
use App\Models\Analysis;
use App\Models\Calculation;
use App\Repositories\BaseRepository;

class CalculationRepository extends BaseRepository
{
    protected $fieldSearchable = [
        
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Calculation::class;
    }

    public static function calcDivider() 
    {
        // hitung hasil pembagi/matrik keputusan
        $analysis = Analysis::with('alternatif', 'kriteria', 'subKriteria')->orderBy('id', 'asc')->get();
        foreach ($analysis->unique('criteria_id') as $item) {
            $penilaianKriteria = $analysis->where('criteria_id', $item->criteria_id);
            $hitung = 0;

            foreach ($penilaianKriteria as $value) {
                if ($value->sub_criteria_id == null) {
                    abort(403, "Masukkan nilai alternatif ". $value->alternatif->objek->name ."!");
                }
                $hitung += pow($value->subKriteria->value, 2);
            }

            $hitung = sqrt($hitung);

            // simpan
            $simpan = Divider::updateOrCreate(
                ['criteria_id' => $item->criteria_id],
                ['value' => $hitung]
            );
        }
    }
}
