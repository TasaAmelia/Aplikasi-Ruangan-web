<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Rental;
use App\Models\Room;
use App\Models\User;
use App\Notifications\RentNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $data = Rental::where('status', 'Accept')->get()->groupBy(function($data){
            return Carbon::parse($data->start)->format('M');
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
        $tanggal = Rental::select('start', 'end', 'title')->where('status', 'Accept')->get();
        
        return view('gedung.dashboard', [
            'title' => 'Dashboard',
            'user' => User::count(),
            'gedung' => Building::count(),
            'ruangan' => Room::count(),
            'pinjam' => Rental::where('status', 'accept')->count(),
            'data' => $data,
            'months' => $months,
            'monthCount' => $monthCount,
            'ruang' => $ruangan,
            'nama' => $labelNama,
            'jumlah' => $jumlah,
            'pengguna' => $user,
            'namaUser' => $namaUser,
            'jumlahPinjam' => $jumlahPinjam,
            'tanggal' => $tanggal
        ]);
        // return view('dashboard.calendar', [
        //     'title' => 'Dashboard'
        // ]);
    }

    public function create(Request $request){
        if($request->ajax()){
            $tanggal = Rental::whereDate('start', '2022-01-13')->whereDate('end', '2022-01-14')->get(['id', 'status', 'start', 'end']);
            return response()->json($tanggal);
        }
    }
}
