<?php

namespace App\Http\Controllers;

use App\Models\JenisRuangan;
use Illuminate\Http\Request;

class JenisRuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('main.jRuangan.jenis_ruangan_list', [
            'title' => 'Data Jenis Ruangan',
            'roomtypes' => JenisRuangan::paginate(10)->withQueryString()
            ])->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.jRuangan.jenis_ruangan_add', [
            'title'     => 'Data Jenis Ruangan',
            'roomtypes' => JenisRuangan::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roomtype = new JenisRuangan();
        $roomtype->nama_jenis_ruangan = $request->input('roomtypename');
        $roomtype->ket_jenis_ruangan = $request->input('roomtypedescription');
        $roomtype->save();
        return redirect('/jenisruanganList')->with('statusAdd', 'Added data jenis ruangan sucessfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('main.jRuangan.jenis_ruangan_update', [
            'title' => 'Data Jenis Ruangan',
            'data' => JenisRuangan::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = JenisRuangan::find($request -> id);
        $data->nama_jenis_ruangan = $request->roomtypename;
        $data->ket_jenis_ruangan = $request->roomtypedescription;
        $data->save();
        return redirect('/jenisruanganList')->with('statusUpdate', 'Update data jenis ruangan sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisRuangan $id)
    {
        $data = JenisRuangan::find($id);
        $data->each->delete();
        return redirect()->back()->with('statusDelete', 'Delete data jenis ruangan sucessfully !');

    }
}
