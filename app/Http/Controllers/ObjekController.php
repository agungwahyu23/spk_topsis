<?php

namespace App\Http\Controllers;

use App\DataTables\ObjekDataTable;
use App\Http\Requests\CreateObjekRequest;
use App\Http\Requests\UpdateObjekRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\ObjekRepository;
use Illuminate\Http\Request;
use Flash;

class ObjekController extends AppBaseController
{
    /** @var ObjekRepository $objekRepository*/
    private $objekRepository;

    public function __construct(ObjekRepository $objekRepo)
    {
        $this->objekRepository = $objekRepo;
    }

    /**
     * Display a listing of the Objek.
     */
    public function index(ObjekDataTable $objekDataTable)
    {
    return $objekDataTable->render('objeks.index');
    }


    /**
     * Show the form for creating a new Objek.
     */
    public function create()
    {
        return view('objeks.create');
    }

    /**
     * Store a newly created Objek in storage.
     */
    public function store(CreateObjekRequest $request)
    {
        $input = $request->all();

        $objek = $this->objekRepository->create($input);

        Flash::success('Objek saved successfully.');

        return redirect(route('objeks.index'));
    }

    /**
     * Display the specified Objek.
     */
    public function show($id)
    {
        $objek = $this->objekRepository->find($id);

        if (empty($objek)) {
            Flash::error('Objek not found');

            return redirect(route('objeks.index'));
        }

        return view('objeks.show')->with('objek', $objek);
    }

    /**
     * Show the form for editing the specified Objek.
     */
    public function edit($id)
    {
        $objek = $this->objekRepository->find($id);

        if (empty($objek)) {
            Flash::error('Objek not found');

            return redirect(route('objeks.index'));
        }

        return view('objeks.edit')->with('objek', $objek);
    }

    /**
     * Update the specified Objek in storage.
     */
    public function update($id, UpdateObjekRequest $request)
    {
        $objek = $this->objekRepository->find($id);

        if (empty($objek)) {
            Flash::error('Objek not found');

            return redirect(route('objeks.index'));
        }

        $objek = $this->objekRepository->update($request->all(), $id);

        Flash::success('Objek updated successfully.');

        return redirect(route('objeks.index'));
    }

    /**
     * Remove the specified Objek from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $objek = $this->objekRepository->find($id);

        if (empty($objek)) {
            Flash::error('Objek not found');

            return redirect(route('objeks.index'));
        }

        $this->objekRepository->delete($id);

        return $this->sendSuccess('Data berhasil dihapus.');
    }
}
