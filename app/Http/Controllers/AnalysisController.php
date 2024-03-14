<?php

namespace App\Http\Controllers;

use App\DataTables\AnalysisDataTable;
use App\Http\Requests\CreateAnalysisRequest;
use App\Http\Requests\UpdateAnalysisRequest;
use App\Http\Controllers\AppBaseController;
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
    return $analysisDataTable->render('analyses.index');
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
        $analysis = $this->analysisRepository->find($id);

        if (empty($analysis)) {
            Flash::error('Analysis not found');

            return redirect(route('analyses.index'));
        }

        return view('analyses.edit')->with('analysis', $analysis);
    }

    /**
     * Update the specified Analysis in storage.
     */
    public function update($id, UpdateAnalysisRequest $request)
    {
        $analysis = $this->analysisRepository->find($id);

        if (empty($analysis)) {
            Flash::error('Analysis not found');

            return redirect(route('analyses.index'));
        }

        $analysis = $this->analysisRepository->update($request->all(), $id);

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
