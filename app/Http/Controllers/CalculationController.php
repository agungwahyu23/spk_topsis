<?php

namespace App\Http\Controllers;

use Flash;
use App\Models\Analysis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DataTables\CalculationDataTable;
use App\Http\Controllers\AppBaseController;
use App\Repositories\CalculationRepository;
use App\Http\Requests\CreateCalculationRequest;
use App\Http\Requests\UpdateCalculationRequest;
use App\Models\Divider;
use App\Models\MatrixNormalization;

class CalculationController extends AppBaseController
{
    /** @var CalculationRepository $calculationRepository*/
    private $calculationRepository;

    public function __construct(CalculationRepository $calculationRepo)
    {
        $this->calculationRepository = $calculationRepo;
    }

    /**
     * Display a listing of the Calculation.
     */
    public function index(CalculationDataTable $calculationDataTable)
    {
        $hasilPembagi = DB::table('divider')
            ->join('criteria', 'criteria.id', 'divider.criteria_id')
            ->select('divider.*', 'criteria.criteria_name')
            ->orderBy('divider.id', 'asc')
            ->get();

        $matriksNormalisasi = CalculationRepository::getMatrixNormalization();

        $bobotTernormalisasi = CalculationRepository::getWeightNormalization();

        $idealPositif = CalculationRepository::getIdealPositif();
        $idealNegative = CalculationRepository::getIdealNegative();

        return view('calculations.index', compact(
            'hasilPembagi',
            'matriksNormalisasi',
            'bobotTernormalisasi',
            'idealPositif',
            'idealNegative'
        ));

        // return $calculationDataTable->render('calculations.index');
    }

    public function calcTopsis() 
    {
        // hitung hasil pembagi/matrik keputusan
        CalculationRepository::calcDivider();

        // hitung matriks ternormalisasi
        CalculationRepository::caclMatrixNormalization();

        // hitung normalisasi terbobot
        CalculationRepository::calcWeightNormalization();

        // hitung ideal positif
        CalculationRepository::calcIdeal();

        Flash::success('Perhitungan berhasil.');

        return redirect(route('calculations.index'));
    }


    /**
     * Show the form for creating a new Calculation.
     */
    public function create()
    {
        return view('calculations.create');
    }

    /**
     * Store a newly created Calculation in storage.
     */
    public function store(CreateCalculationRequest $request)
    {
        $input = $request->all();

        $calculation = $this->calculationRepository->create($input);

        Flash::success('Calculation saved successfully.');

        return redirect(route('calculations.index'));
    }

    /**
     * Display the specified Calculation.
     */
    public function show($id)
    {
        $calculation = $this->calculationRepository->find($id);

        if (empty($calculation)) {
            Flash::error('Calculation not found');

            return redirect(route('calculations.index'));
        }

        return view('calculations.show')->with('calculation', $calculation);
    }

    /**
     * Show the form for editing the specified Calculation.
     */
    public function edit($id)
    {
        $calculation = $this->calculationRepository->find($id);

        if (empty($calculation)) {
            Flash::error('Calculation not found');

            return redirect(route('calculations.index'));
        }

        return view('calculations.edit')->with('calculation', $calculation);
    }

    /**
     * Update the specified Calculation in storage.
     */
    public function update($id, UpdateCalculationRequest $request)
    {
        $calculation = $this->calculationRepository->find($id);

        if (empty($calculation)) {
            Flash::error('Calculation not found');

            return redirect(route('calculations.index'));
        }

        $calculation = $this->calculationRepository->update($request->all(), $id);

        Flash::success('Calculation updated successfully.');

        return redirect(route('calculations.index'));
    }

    /**
     * Remove the specified Calculation from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $calculation = $this->calculationRepository->find($id);

        if (empty($calculation)) {
            Flash::error('Calculation not found');

            return redirect(route('calculations.index'));
        }

        $this->calculationRepository->delete($id);

        Flash::success('Calculation deleted successfully.');

        return redirect(route('calculations.index'));
    }
}
