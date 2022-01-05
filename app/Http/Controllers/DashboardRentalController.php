<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Rental;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardRentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return Rental::where('user_id', auth()->user()->id)->get();
        // with(['building', 'room'])->where('user_id', auth()->user()->id)->paginate(5)
        return view('peminjaman.peminjaman_list', [
            'title' => 'Peminjaman',
            'rents' => Rental::with(['building', 'room'])->paginate(5)
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('peminjaman.peminjaman_add', [
            'title'     => 'Pinjam Ruangan',
            'mainTitle' => 'Peminjaman',
            'buildings' => Building::all(),
        ]);
    }

    // public function auto(Request $request)
    // {
    //     $data = $request->all();
    //     $query = $data['query'];
    //     $filter_data = Room::select('roomname')
    //                     ->where('roomname', 'LIKE', '%'.$query.'%')
    //                     ->get();
    //     return response()->json($filter_data);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->validate([
            //     'gedung_id' => 'required',
            //     'room_id' => 'required',
            //     'jenis_pinjaman' => 'required',
            //     'tgl_awal_pinjam' => 'required',
            //     'tgl_akhir_pinjam' => 'required',
            //     'description' => 'required'
            // ]);
            // $data['user_id'] = auth()->user()->id;
            // Rental::create($data);
            
        $rent = new Rental();
        $rent->building_id = $request->input('gedung_id');
        $rent->room_id = $request->input('room_id');
        $rent->user_id = auth()->user()->id;
        $rent->jenis_pinjam = $request->input('jenis_pinjaman');
        $rent->tanggal_awal = $request->input('tgl_awal_pinjam');
        $rent->tanggal_akhir = $request->input('tgl_akhir_pinjam');
        $rent->status = 'Pending';
        $rent->keterangan = $request->input('description');
        $rent->save();
        return redirect('/rental');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function show(Rental $rental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function edit(Rental $rental, Request $request)
    {
        // dd($request->input('status'));
        $data = Rental::find($rental -> id);
        // dd($data);
        $data->keterangan = $request->input('message');
        $data->save();
        return redirect('/rental');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rental $rental)
    {
        // dd($request->input('message'));
        // dd($request->input('status'));
        $data = Rental::find($rental -> id);
        // // dd($data);
        $data->status = $request->input('status');
        $data->keterangan = $request->input('message');
        $data->save();
        return response()->json(
            [
              'success' => true,
              'status' => 200
            ]);
        // return redirect('/rental')->with('success', true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rental $rental)
    {
        //
    }
}
