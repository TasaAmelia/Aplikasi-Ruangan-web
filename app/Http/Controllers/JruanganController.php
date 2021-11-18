<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JruanganController extends Controller
{
    public function read()
    {
        return view('jRuangan.jenis_ruangan_list', [
            'title' => 'Data Jenis Ruangan'
        ]);
    }
}
