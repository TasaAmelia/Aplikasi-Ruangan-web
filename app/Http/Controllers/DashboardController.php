<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Rental;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function read()
    {
        $data = Rental::where('status', 'Accept')->get()->groupBy(function($data){
            return Carbon::parse($data->tanggal_akhir)->format('M');
        });

        $months=[];
        $monthCount=[];
        foreach($data as $month => $values){
            $months[]=$month;
            $monthCount[]=count($values);
        }
        return view('gedung.dashboard', [
            'title' => 'Dashboard',
            'user' => User::count(),
            'gedung' => Building::count(),
            'ruangan' => Room::count(),
            'pinjam' => Rental::count(),
            'data' => $data,
            'months' => $months,
            'monthCount' => $monthCount
        ]);
        // return view('dashboard.calendar', [
        //     'title' => 'Dashboard'
        // ]);
    }
}
