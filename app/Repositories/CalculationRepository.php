<?php

namespace App\Repositories;

use App\Models\Divider;
use App\Models\Analysis;
use App\Models\Criteria;
use App\Models\Calculation;
use App\Models\IdealNegative;
use App\Models\IdealPositif;
use Illuminate\Support\Facades\DB;
use App\Models\MatrixNormalization;
use App\Models\WeightNormalization;
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

    public static function getMatrixNormalization() 
    {
        $data = MatrixNormalization::join('criteria', 'criteria.id', 'matrix_normalization.criteria_id')
            ->join('alternative', 'alternative.id', 'matrix_normalization.alternative_id')
            ->join('objeks', 'objeks.id', 'alternative.objek_id')
            ->select(
                'matrix_normalization.*', 
                'criteria.criteria_name', 
                'objeks.name'
                )
            ->orderBy('matrix_normalization.id', 'asc')
            ->get();   
        
        return $data;
    }

    public static function caclMatrixNormalization() 
    {
        $analysis = Analysis::with('alternatif', 'kriteria', 'subKriteria')->orderBy('id', 'asc')->get();  

        foreach ($analysis->unique('criteria_id') as $item) {
            $penilaianKriteria = $analysis->where('criteria_id', $item->criteria_id);
            $pembagi = Divider::where('criteria_id', $item->criteria_id)->first();

            foreach ($penilaianKriteria as $value) {
                $matriksNormalisasi = $value->subKriteria->value / $pembagi->value;

                // simpan
                $simpan = MatrixNormalization::updateOrCreate(
                    ['criteria_id' => $value->criteria_id, 'alternative_id' => $value->alternative_id],
                    ['value' => $matriksNormalisasi]
                );
            }
        }
    }

    public static function calcWeightNormalization() 
    {
        $matriksNormalisasi = self::getMatrixNormalization();
        foreach ($matriksNormalisasi->unique('criteria_id') as $item) {
            $matriksNormalisasiKriteria = $matriksNormalisasi->where('criteria_id', $item->criteria_id);
            $bobotKriteria = Criteria::where('id', $item->criteria_id)->firstOrFail();

            foreach ($matriksNormalisasiKriteria as $value) {
                $normalisasi_terbobot = $value->value * $bobotKriteria->value;

                // simpan
                $simpan = WeightNormalization::updateOrCreate(
                    ['criteria_id' => $value->criteria_id, 'alternative_id' => $value->alternative_id],
                    ['value' => $normalisasi_terbobot]
                );
            }
        }
    }

    public static function getWeightNormalization() 
    {
        $data = WeightNormalization::join('criteria', 'criteria.id', 'wight_normalization.criteria_id')
            ->join('alternative', 'alternative.id', 'wight_normalization.alternative_id')
            ->join('objeks', 'objeks.id', 'alternative.objek_id')
            ->select('wight_normalization.*', 'criteria.criteria_name', 'objeks.name')
            ->orderBy('wight_normalization.id', 'asc')
            ->get();  
            
        return $data;
    }

    public static function getIdealPositif() 
    {
        $data = DB::table('ideal_positif as ip')
            ->join('criteria as k', 'k.id', 'ip.criteria_id')
            ->join('alternative as a', 'a.id', 'ip.alternative_id')
            ->join('objeks as o', 'o.id', 'a.objek_id')
            ->select('ip.*', 'k.criteria_name', 'o.name')
            ->orderBy('ip.id', 'asc')
            ->get();

        return $data; 
    }

    public static function getIdealNegative() 
    {
        $data = DB::table('ideal_negatif as in')
            ->join('criteria as k', 'k.id', 'in.criteria_id')
            ->join('alternative as a', 'a.id', 'in.alternative_id')
            ->join('objeks as o', 'o.id', 'a.objek_id')
            ->select('in.*', 'k.criteria_name', 'o.name')
            ->orderBy('in.id', 'asc')
            ->get();

        return $data; 
    }

    public static function calcIdeal() 
    {
        // ambil data bobot ternormalisasi
        $bobotNormalisasi = self::getWeightNormalization();

        // loop data bobot ternormalisasi berdasarkan criteria
        foreach ($bobotNormalisasi->unique('criteria_id') as $item) {
            // ambil data bobot ternormalisasi  yang criteria_id nya sesuai
            $dataBobotNormalisasi = $bobotNormalisasi->where('criteria_id', $item->criteria_id);

            // lakukan looping dan tampung hasilnya dalam array
            $solusiIdealY = [];
            foreach ($dataBobotNormalisasi as $value) {
                $solusiIdealY[] = $value->value;
            }

            // cari min max berdasarkan cost benefit kriteria
            $solusiIdealPositif = ['value' => max($solusiIdealY), 'criteria_id' => $item->criteria_id];

            $solusiIdealNegatif = ['value' => min($solusiIdealY), 'criteria_id' => $item->criteria_id];

            // hitung matrik solusi ideal tiap kriteria
            foreach ($dataBobotNormalisasi as $value) {
                $idealPositif = pow($value->value - $solusiIdealPositif['value'], 2);
                $simpan = IdealPositif::updateOrCreate(
                    ['criteria_id' => $value->criteria_id, 'alternative_id' => $value->alternative_id],
                    ['value' => $idealPositif]
                );

                $idealNegatif = pow($value->value - $solusiIdealNegatif['value'], 2);                
                $simpan = IdealNegative::updateOrCreate(
                    ['criteria_id' => $value->criteria_id, 'alternative_id' => $value->alternative_id],
                    ['value' => $idealNegatif]
                );
            }
        }
    }
}
