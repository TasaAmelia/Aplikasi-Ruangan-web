<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Building;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('ruangan.ruangan_list', [
            'title' => 'Data Ruangan',
            'rooms' => Room::paginate(10)->withQueryString()
            ])->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruangan.ruangan_add', [
            'title'     => 'Tambah Ruangan',
            'mainTitle' => 'Ruangan',
            'rooms' => Room::all(),
            'buildings'=> Building::all(),
            'roomtypes'=> RoomType::all()
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
        $room = new Room();
        $room->roomname = $request->input('roomname');
        $room->roomtypename = $request->input('roomtypename');
        $room->buildingname = $request->input('buildingname');
        $room->roomdescription = $request->input('roomdescription');
        $room->save();
        return redirect('/ruanganList')->with('statusAdd', 'Added data sucessfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
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
        return view('ruangan.ruangan_update', [
            'title' => 'Update Ruangan',
            'mainTitle' => 'Ruangan',
            'data' => Room::find($id),
            'buildings'=> Building::all(),
            'roomtypes'=> RoomType::all()
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
        $data = Room::find($request -> id);
        $data->roomname = $request->roomname;
        $data->roomdescription = $request->roomdescription;
        $data->roomtypename = $request->roomtypename;
        $data->buildingname = $request->buildingname;
        $data->save();
        return redirect('/ruanganList')->with('statusUpdate', 'Update data sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $id)
    {
        $data = Room::find($id);
        $data->each->delete();
        return redirect()->back()->with('statusDelete', 'Delete data sucessfully !');
    }
}
