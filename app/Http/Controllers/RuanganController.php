<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function read()
    {
        return view('ruangan.ruangan_list', [
            'title' => 'Data Ruangan'
        ]);
    }
}
