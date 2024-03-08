<?php

namespace App\Http\Controllers;

use App\DataTables\AlternativeDataTable;
use App\Http\Requests\CreateAlternativeRequest;
use App\Http\Requests\UpdateAlternativeRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Alternative;
use App\Models\Objek;
use App\Repositories\AlternativeRepository;
use Illuminate\Http\Request;
use Flash;

class AlternativeController extends AppBaseController
{
    /** @var AlternativeRepository $alternativeRepository*/
    private $alternativeRepository;

    public function __construct(AlternativeRepository $alternativeRepo)
    {
        $this->alternativeRepository = $alternativeRepo;
    }

    /**
     * Display a listing of the Alternative.
     */
    public function index(AlternativeDataTable $alternativeDataTable)
    {
    return $alternativeDataTable->render('alternatives.index');
    }


    /**
     * Show the form for creating a new Alternative.
     */
    public function create()
    {
        $objek = Objek::all()->pluck('name', 'id')->toArray();

        return view('alternatives.create', compact('objek'));
    }

    /**
     * Store a newly created Alternative in storage.
     */
    public function store(CreateAlternativeRequest $request)
    {
        $input = $request->all();

        $alternative = $this->alternativeRepository->create($input);

        Flash::success('Alternative saved successfully.');

        return redirect(route('alternatives.index'));
    }

    /**
     * Display the specified Alternative.
     */
    public function show($id)
    {
        $alternative = $this->alternativeRepository->find($id);

        if (empty($alternative)) {
            Flash::error('Alternative not found');

            return redirect(route('alternatives.index'));
        }

        return view('alternatives.show')->with('alternative', $alternative);
    }

    /**
     * Show the form for editing the specified Alternative.
     */
    public function edit($id)
    {
        // $alternative = $this->alternativeRepository->find($id);
        $alternative = Alternative::leftJoin('objeks', 'objeks.id', 'alternative.objek_id')
                        ->select(
                            'alternative.id',
                            'alternative.objek_id',
                            'objeks.code',
                            'objeks.name',
                        )
                        ->where('alternative.id', $id)
                        ->first();
                        // dd($alternative);

        if (empty($alternative)) {
            Flash::error('Alternative not found');

            return redirect(route('alternatives.index'));
        }

        $objek = Objek::all()->pluck('name', 'id')->toArray();

        return view('alternatives.edit', compact('objek'))->with('alternative', $alternative);
    }

    /**
     * Update the specified Alternative in storage.
     */
    public function update($id, UpdateAlternativeRequest $request)
    {
        $alternative = $this->alternativeRepository->find($id);

        if (empty($alternative)) {
            Flash::error('Alternative not found');

            return redirect(route('alternatives.index'));
        }

        $alternative = $this->alternativeRepository->update($request->all(), $id);

        Flash::success('Alternative updated successfully.');

        return redirect(route('alternatives.index'));
    }

    /**
     * Remove the specified Alternative from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $alternative = $this->alternativeRepository->find($id);

        if (empty($alternative)) {
            Flash::error('Alternative not found');

            return redirect(route('alternatives.index'));
        }

        $this->alternativeRepository->delete($id);

        return $this->sendSuccess('Data berhasil dihapus.');
    }
}
