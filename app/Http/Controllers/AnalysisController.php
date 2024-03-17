<?php

namespace App\Http\Controllers;

use App\DataTables\AnalysisDataTable;
use App\Http\Requests\CreateAnalysisRequest;
use App\Http\Requests\UpdateAnalysisRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Alternative;
use App\Models\Analysis;
use App\Models\Criteria;
use App\Models\SubCriteria;
use App\Repositories\AnalysisRepository;
use Illuminate\Http\Request;
use Flash;

class AnalysisController extends AppBaseController
{
    /** @var AnalysisRepository $analysisRepository*/
    private $analysisRepository;

    public function __construct(AnalysisRepository $analysisRepo)
    {
        $this->analysisRepository = $analysisRepo;
    }

    /**
     * Display a listing of the Analysis.
     */
    public function index(AnalysisDataTable $analysisDataTable)
    {
        \DB::statement("SET SQL_MODE=''");

        $data = Analysis::with('alternatif', 'kriteria', 'subKriteria')->orderBy('id', 'asc')->get();

        $criteria = Criteria::get();

        return view('analyses.index', compact('criteria', 'data'));
    }


    /**
     * Show the form for creating a new Analysis.
     */
    public function create()
    {
        return view('analyses.create');
    }

    /**
     * Store a newly created Analysis in storage.
     */
    public function store(CreateAnalysisRequest $request)
    {
        $input = $request->all();

        $analysis = $this->analysisRepository->create($input);

        Flash::success('Analysis saved successfully.');

        return redirect(route('analyses.index'));
    }

    /**
     * Display the specified Analysis.
     */
    public function show($id)
    {
        $analysis = $this->analysisRepository->find($id);

        if (empty($analysis)) {
            Flash::error('Analysis not found');

            return redirect(route('analyses.index'));
        }

        return view('analyses.show')->with('analysis', $analysis);
    }

    /**
     * Show the form for editing the specified Analysis.
     */
    public function edit($id)
    {
        $analysis = Analysis::where('alternative_id', $id)->first();

        if (empty($analysis)) {
            Flash::error('Analysis not found');

            return redirect(route('analyses.index'));
        }

        $data2 = Analysis::where('alternative_id', $id)->get();
        $subKriteria = SubCriteria::all();

        return view('analyses.edit', compact('data2', 'subKriteria'))->with('analysis', $analysis);
    }

    /**
     * Update the specified Analysis in storage.
     */
    public function update($id, UpdateAnalysisRequest $request)
    {
        $input = $request->all();

        // update penilaian/analysis
        $criteria = Criteria::get();
        
        foreach ($criteria as $key => $value) {
            $update = Analysis::updateOrCreate(
                ['alternative_id' => $request->alternative_id, 'criteria_id' => $value->id],
                ['sub_criteria_id' => $request->criteria_id[$key]]);
        }
        // end update penilaian/analysis

        Flash::success('Analysis updated successfully.');

        return redirect(route('analyses.index'));
    }

    /**
     * Remove the specified Analysis from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $analysis = $this->analysisRepository->find($id);

        if (empty($analysis)) {
            Flash::error('Analysis not found');

            return redirect(route('analyses.index'));
        }

        $this->analysisRepository->delete($id);

        Flash::success('Analysis deleted successfully.');

        return redirect(route('analyses.index'));
    }
}
