<?php

namespace App\Http\Controllers;

use App\Models\JenisRuangan;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
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
            'title'     => 'Tambah Jenis Ruangan',
            'mainTitle' => 'Jenis Ruangan',
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
        return redirect('/jenisruanganList')->with('statusAdd', 'Added data sucessfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoomType  $roomType
     * @return \Illuminate\Http\Response
     */
    public function show(RoomType $roomType)
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
        return view('jRuangan.jenis_ruangan_update', [
            'title' => 'Update Jenis Ruangan',
            'mainTitle' => 'Jenis Ruangan',
            'data' => RoomType::find($id)
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
        $data = RoomType::find($request -> id);
        $data->roomtypename = $request->roomtypename;
        $data->roomtypedescription = $request->roomtypedescription;
        $data->save();
        return redirect('/jenisruanganList')->with('statusUpdate', 'Update data sucessfully');
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
        return redirect()->back()->with('statusDelete', 'Delete data sucessfully !');

    }
}
