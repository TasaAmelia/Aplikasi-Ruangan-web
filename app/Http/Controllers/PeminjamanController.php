<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function read()
    {
        return view('peminjaman.peminjaman_list', [
            'title' => 'Peminjaman'
        ]);
    }
}
