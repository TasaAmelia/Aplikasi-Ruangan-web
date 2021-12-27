<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function read()
    {
        // return view('gedung.dashboard', [
        //     'title' => 'Dashboard'
        // ]);
        return view('dashboard.calendar', [
            'title' => 'Dashboard'
        ]);
    }
}
