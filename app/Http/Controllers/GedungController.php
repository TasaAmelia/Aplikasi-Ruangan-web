<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GedungController extends Controller
{
    public function index() {
        return view('gedung.gedung_list', [
            'title' => 'Data Gedung'
        ]);
    }
}
