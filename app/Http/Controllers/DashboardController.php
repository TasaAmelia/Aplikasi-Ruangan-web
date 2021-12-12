<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function read()
    {
        return view('main.dashboard.Dashboard', [
            'title' => 'Dashboard'
        ]);
    }
}
