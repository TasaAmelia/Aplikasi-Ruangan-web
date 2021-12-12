<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('main.ruangan.ruangan_list', [
            'title' => 'Data Ruangan',
            'rooms' => Ruangan::paginate(10)->withQueryString()
            ])->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.ruangan.ruangan_add', [
            'title'     => 'Data Ruangan',
            'rooms' => Ruangan::all()
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
        $room = new Ruangan();
        $room->nama_ruangan = $request->input('roomname');
        $room->ket_ruangan = $request->input('roomdescription');
        $room->save();
        return redirect('/ruanganList')->with('statusAdd', 'Added data ruangan sucessfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('main.ruangan.ruangan_update', [
            'title' => 'Data Ruangan',
            'data' => Ruangan::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = Ruangan::find($request -> id);
        $data->nama_ruangan = $request->roomname;
        $data->ket_ruangan = $request->roomdescription;
        $data->save();
        return redirect('/ruanganList')->with('statusUpdate', 'Update data ruangan sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Ruangan::find($id);
        $data->each->delete();
        return redirect()->back()->with('statusDelete', 'Delete data ruangan sucessfully !');
    }
}
