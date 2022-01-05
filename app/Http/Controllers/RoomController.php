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
            'rooms' => Room::with(['building','roomtype'])->paginate(5)
        ]);
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
        $room->roomtype_id = $request->input('roomtype_id');
        $room->building_id = $request->input('building_id');
        $room->roomdescription = $request->input('roomdescription');
        $room->save();
        return redirect('/ruangan')->with('statusAdd', 'Added data sucessfully !');
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
        $data->roomtype_id = $request->roomtype_id;
        $data->building_id = $request->building_id;
        $data->roomdescription = $request->roomdescription;
        $data->save();
        return redirect('/ruangan')->with('statusUpdate', 'Update data sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Room::find($id);
        $data->delete();
        // return redirect()->back()->with('statusDelete', 'Delete data sucessfully !');
        return response()->json([
            'success' => true
        ]);
    }
}
