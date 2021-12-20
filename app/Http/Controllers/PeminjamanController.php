<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function read(Request $request)
    {
        return view('main.peminjaman.peminjaman_list', [
            'title'             => 'Peminjaman',
            'peminjamans'       => Peminjaman::paginate(10)->withQueryString()
        ])->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function add()
    {
        return view('main.peminjaman.peminjaman_formAdd', [
            'title'         => 'Peminjaman',
            'peminjaman'   => Peminjaman::all()
        ]);
    }

    public function create(Request $request)
    {
        $peminjaman = new Peminjaman();
        $peminjaman->jenis_pinjaman = $request->input('jenis_pinjaman');
        $peminjaman->nama_peminjam = $request->input('nama_peminjam');
        $peminjaman->tgl_awal_pinjam = $request->input('tgl_awal_pinjam');
        $peminjaman->tgl_akhir_pinjam = $request->input('tgl_akhir_pinjam');
        $peminjaman->ket_peminjaman = $request->input('body');
        $peminjaman->save();
        return redirect('/peminjamanList')->with('statusAdd', 'Added peminjaman sucessfully !');
    }

}
