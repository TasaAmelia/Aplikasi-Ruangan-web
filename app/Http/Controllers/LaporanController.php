<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function read()
    {
        return view('laporan.laporan', [
            'title' => 'Laporan'
        ]);
    }
}
