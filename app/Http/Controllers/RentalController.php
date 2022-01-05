<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Building;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('history.list', [
        //     'title'     => 'Riwayat Peminjaman',
        //     'mainTitle' => 'Peminjaman'
        // ]);
        return view('history.list', [
            'title' => 'Riwayat Peminjaman',
            'rents' => Rental::with(['building', 'room'])->where('user_id', auth()->user()->id)->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userRental.add', [
            'title'     => 'Pinjam Ruangan',
            'mainTitle' => 'Peminjaman',
            'buildings' => Building::all(),
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
        return redirect('/');
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
    public function edit(Rental $rental)
    {
        //
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
        //
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
