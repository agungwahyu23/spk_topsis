<?php

namespace App\Http\Controllers;

use App\DataTables\SubCriteriaDataTable;
use App\Http\Requests\CreateSubCriteriaRequest;
use App\Http\Requests\UpdateSubCriteriaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Criteria;
use App\Models\SubCriteria;
use App\Repositories\SubCriteriaRepository;
use Illuminate\Http\Request;
use Flash;

class SubCriteriaController extends AppBaseController
{
    /** @var SubCriteriaRepository $subCriteriaRepository*/
    private $subCriteriaRepository;

    public function __construct(SubCriteriaRepository $subCriteriaRepo)
    {
        $this->subCriteriaRepository = $subCriteriaRepo;
    }

    /**
     * Display a listing of the SubCriteria.
     */
    public function index(SubCriteriaDataTable $subCriteriaDataTable)
    {
    return $subCriteriaDataTable->render('sub_criterias.index');
    }


    /**
     * Show the form for creating a new SubCriteria.
     */
    public function create()
    {
        $criteria = Criteria::all()->pluck('criteria_name', 'id')->toArray();

        return view('sub_criterias.create', compact('criteria'));
    }

    /**
     * Store a newly created SubCriteria in storage.
     */
    public function store(CreateSubCriteriaRequest $request)
    {
        $input = $request->all();

        $subCriteria = $this->subCriteriaRepository->create($input);

        Flash::success('Sub Criteria saved successfully.');

        return redirect(route('subCriterias.index'));
    }

    /**
     * Display the specified SubCriteria.
     */
    public function show($id)
    {
        $subCriteria = $this->subCriteriaRepository->find($id);

        if (empty($subCriteria)) {
            Flash::error('Sub Criteria not found');

            return redirect(route('subCriterias.index'));
        }

        return view('sub_criterias.show')->with('subCriteria', $subCriteria);
    }

    /**
     * Show the form for editing the specified SubCriteria.
     */
    public function edit($id)
    {
        $criteria = Criteria::find($id);

        if (empty($criteria)) {
            Flash::error('Data not found');

            return redirect(route('subCriterias.index'));
        }

        $sub_criteria = SubCriteria::where('criteria_id', $id)->get();

        return view('sub_criterias.edit', compact('sub_criteria'))->with('criteria', $criteria);
    }

    /**
     * Update the specified SubCriteria in storage.
     */
    public function update($id, UpdateSubCriteriaRequest $request)
    {
        $input = $request->all();
        
        if (count($input['id']) > 0) {
            // loop data berdasarkan id
            foreach ($input['id'] as $key => $item) {
                // update data
                $data = SubCriteria::where('id', $item)
                ->update([
                    'description' => $input['description'][$key],
                    'value' => $input['value'][$key],
                ]);
            }
        }

        Flash::success('Sub Criteria updated successfully.');

        return redirect(route('subCriterias.index'));
    }

    /**
     * Remove the specified SubCriteria from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $subCriteria = $this->subCriteriaRepository->find($id);

        if (empty($subCriteria)) {
            Flash::error('Sub Criteria not found');

            return redirect(route('subCriterias.index'));
        }

        $this->subCriteriaRepository->delete($id);

        return $this->sendSuccess('Data berhasil dihapus.');
    }
}
