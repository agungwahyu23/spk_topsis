<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Criteria;
use App\Models\SubCriteria;
use App\Models\ResultTopsis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Objek;
use App\Models\ObjekGallery;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        \DB::statement("SET SQL_MODE=''");

        $data_criteria = Criteria::get();

        $criteria = $data_criteria->map(function ($q) {
           $sub = SubCriteria::where('criteria_id', $q->id)->get();
           
           return [
                'id' => $q->id,
                'code' => $q->code,
                'criteria_name' => $q->criteria_name,
                'status' => $q->status,
                'value' => $q->value,
                'sub' => $sub,
           ];
        });
        
        // Lakukan filter berdasarkan kriteria yang dipilih
        $filteredResults = ResultTopsis::query();
        $filteredResults = $filteredResults
        ->select(
            'result_topsis.*',
            'objeks.id as objek_id',
            'objeks.name',
            'objeks.thumbnail'
        )
        ->leftJoin('alternative', 'alternative.id', 'result_topsis.alternative_id')
        ->leftJoin('objeks', 'objeks.id', 'alternative.objek_id')
        ->leftJoin('analysis', 'alternative.id', 'analysis.alternative_id');

        // Filter berdasarkan kriteria yang dipilih
        if ($request->filled('harga')) {
            $filteredResults->orWhere('analysis.sub_criteria_id', '=', $request->harga);
        }

        if ($request->filled('jarak')) {
            $filteredResults->orWhere('analysis.sub_criteria_id', '=', $request->jarak);
        }

        if ($request->filled('akses')) {
            $filteredResults->orWhere('analysis.sub_criteria_id', '=', $request->akses);
        }

        if ($request->filled('fasilitas')) {
            $filteredResults->orWhere('analysis.sub_criteria_id', '=', $request->fasilitas);
        }

        $filteredResults = $filteredResults->orderBy('result_topsis.nilai', 'DESC')
        ->groupBy('result_topsis.alternative_id')
        ->get()
        ->take(6);

        $objek = Objek::get();
        // dd($objek);

        return view('frontend.home', compact('criteria', 'objek'), ['recomendation' => $filteredResults]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objek = Objek::find($id);
        $gallery = ObjekGallery::where('objek_id', $id)->get();

        return view('frontend.detail', compact('objek', 'gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
