<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rental;
use App\Models\Building;
use Illuminate\Http\Request;
use App\Notifications\RentNotification;
use Illuminate\Support\Facades\Notification;

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
        $users = User::where('usertype', 'Admin')->get();
        $rent = new Rental();
        $rent->building_id = $request->input('gedung_id');
        $rent->room_id = $request->input('room_id');
        $rent->user_id = auth()->user()->id;
        $rent->jenis_pinjam = $request->input('jenis_pinjaman');
        $rent->start = $request->input('tgl_awal_pinjam');
        $rent->end = $request->input('tgl_akhir_pinjam');
        $rent->title = $request->input('description');
        $rent->status = 'Pending';
        $rent->keterangan = 'Pending';
        $rent->save();
        Notification::send($users, new RentNotification($rent));
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
