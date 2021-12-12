<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function pinjam()
    {
        return view('main.peminjaman.peminjaman_form', [
            'title' => 'Peminjaman'
        ]);
    }

    public function list()
    {
        return view('main.peminjaman.peminjaman_list', [
            'title' => 'Peminjaman'
        ]);
    }
}
