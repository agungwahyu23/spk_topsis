<?php

namespace App\Http\Controllers;

use App\Models\Objek;
use Laracasts\Flash\Flash;
use App\Models\ObjekGallery;
use Illuminate\Http\Request;

class ObjekGalleryController extends AppBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $input = $request->all();

        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenameSimpan = 'image' . '_' . time() . '.' . $extension;

            $request->file('image')->move(public_path().'/media/', $filenameSimpan);
            $input['image'] = $filenameSimpan;
        }

        $objek_gallery = ObjekGallery::create([
            'objek_id' => $input['objek_id'],
            'title' => $input['title'],
            'image' => $filenameSimpan,
        ]);

        Flash::success('Image saved successfully.');

        return redirect(route('objekGallery.edit', $request->objek_id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objek = Objek::find($id);
        $gallery = ObjekGallery::where('objek_id', $id)->get();
        
        return view('objek_gallery.index', compact('objek','gallery'));
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
        $gallery = ObjekGallery::find($id)->delete();

        return $this->sendSuccess('Data berhasil dihapus.');
    }
}
