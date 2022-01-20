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
        $ruangan = Rental::where('status', 'Accept')->with('room')->get()->groupBy(function($ruangan){
            return $ruangan->room->roomname;
        });
        $user = Rental::where('status', 'Accept')->with('user')->get()->groupBy(function($user){
            return $user->user->instansi;
        });

        $months=[];
        $monthCount=[];
        foreach($data as $month => $values){
            $months[]=$month;
            $monthCount[]=count($values);
        }

        $labelNama=[];
        $jumlah=[];
        foreach($ruangan as $nama => $nilai){
            $labelNama[]=$nama;
            $jumlah[]=count($nilai);
        }

        $namaUser=[];
        $jumlahPinjam=[];
        foreach($user as $userName => $value){
            $namaUser[]=$userName;
            $jumlahPinjam[]=count($value);
        }



        return view('gedung.dashboard', [
            'title' => 'Dashboard',
            'user' => User::count(),
            'gedung' => Building::count(),
            'ruangan' => Room::count(),
            'pinjam' => Rental::count(),
            'data' => $data,
            'months' => $months,
            'monthCount' => $monthCount,
            'ruang' => $ruangan,
            'nama' => $labelNama,
            'jumlah' => $jumlah,
            'pengguna' => $user,
            'namaUser' => $namaUser,
            'jumlahPinjam' => $jumlahPinjam
        ]);
        // return view('dashboard.calendar', [
        //     'title' => 'Dashboard'
        // ]);
    }
}
