<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Rental;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Symfony\Component\HttpFoundation\Session\Session;

class LaporanController extends Controller
{
    public function read()
    {
        $bulan = Rental::where('status', 'Accept')->get()->groupBy(function($bulan){
            return Carbon::parse($bulan->start)->translatedFormat('F');
        });
        $bulanNum = Rental::where('status', 'Accept')->get()->groupBy(function($bulan){
            return Carbon::parse($bulan->start)->translatedFormat('m');
        });
        $getMonths=[];
        foreach($bulan as $i => $j){
            $getMonths[]=$i;
        }
        $getMonthNum=[];
        foreach($bulanNum as $i => $j){
            $getMonthNum[]=$i;
        }

        $year = Rental::where('status', 'Accept')->get()->groupBy(function($year){
            return Carbon::parse($year->start)->translatedFormat('Y');
        });
        $getYears=[];
        foreach($year as $i => $j){
            $getYears[]=$i;
        }


        return view('laporan.laporan', [
            'title' => 'Laporan',
            'rents' => Rental::with(['building', 'room'])->paginate(5),
            'getMonths' => $getMonths,
            'getMonthsNum' => $getMonthNum,
            'getYears' => $getYears
            
        ]);
    }

    public function print(Request $request)
    {

        $hari = $request->input('hari');
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // dd($bulan);
        // dd($hari);
        // dd($tahun);

        if (empty($hari) && $bulan == "Pilih Bulan") {

            $jumahRental = Rental::where('status', 'Accept')->whereYear('start', $tahun)->count();
    
            $ruanganRental = Rental::where('status', 'Accept')->whereYear('start', $tahun)->with('room')->get()->groupBy(function($ruanganRental){
                return $ruanganRental->room->roomname;
            });
    
            $userRental = Rental::where('status', 'Accept')->whereYear('start', $tahun)->with('user')->get()->groupBy(function($userRental){
                return $userRental->user->instansi;
            });
    
            $namaUser=[];
            $jumlahPinjam=[];
            foreach($userRental as $userName => $value){
                $namaUser[]=$userName;
                $jumlahPinjam[]=count($value);
            }
    
            $namaRuangan=[];
            $jumlahRuangan=[];
            foreach($ruanganRental as $roomName => $value){
                $namaRuangan[]=$roomName;
                $jumlahRuangan[]=count($value);
            }
        }

        elseif(empty($hari)){

            $jumahRental = Rental::where('status', 'Accept')->whereMonth('start', $bulan)->whereYear('start', $tahun)->count();
    
            $ruanganRental = Rental::where('status', 'Accept')->whereMonth('start', $bulan)->whereYear('start', $tahun)->with('room')->get()->groupBy(function($ruanganRental){
                return $ruanganRental->room->roomname;
            });
    
            $userRental = Rental::where('status', 'Accept')->whereMonth('start', $bulan)->whereYear('start', $tahun)->with('user')->get()->groupBy(function($userRental){
                return $userRental->user->instansi;
            });
    
            $namaUser=[];
            $jumlahPinjam=[];
            foreach($userRental as $userName => $value){
                $namaUser[]=$userName;
                $jumlahPinjam[]=count($value);
            }
    
            $namaRuangan=[];
            $jumlahRuangan=[];
            foreach($ruanganRental as $roomName => $value){
                $namaRuangan[]=$roomName;
                $jumlahRuangan[]=count($value);
            }
        }

        elseif($tahun == "Pilih Tahun" && $bulan == "Pilih Bulan"){

            $jumahRental = Rental::where('status', 'Accept')->whereDate('start', $hari)->count();
    
            $ruanganRental = Rental::where('status', 'Accept')->whereDate('start', $hari)->with('room')->get()->groupBy(function($ruanganRental){
                return $ruanganRental->room->roomname;
            });
    
            $userRental = Rental::where('status', 'Accept')->whereDate('start', $hari)->with('user')->get()->groupBy(function($userRental){
                return $userRental->user->instansi;
            });
    
            $namaUser=[];
            $jumlahPinjam=[];
            foreach($userRental as $userName => $value){
                $namaUser[]=$userName;
                $jumlahPinjam[]=count($value);
            }
    
            $namaRuangan=[];
            $jumlahRuangan=[];
            foreach($ruanganRental as $roomName => $value){
                $namaRuangan[]=$roomName;
                $jumlahRuangan[]=count($value);
            }
        }

        
        $pdf = PDF::loadView('laporan.print-pdf', [
            'jumahrentalbulan' => $jumahRental,
            'user' => $namaUser,
            'jumlahpinjam' => $jumlahPinjam,
            'ruangan' => $namaRuangan,
            'jumlahruangan' => $jumlahRuangan,
        ]);
        // return view('laporan.print-pdf',[
        //     'title' => 'Laporan',
        //     'jumahrentalbulan' => $jumahRentalBulan,
        //     'user' => $namaUser,
        //     'jumlahpinjam' => $jumlahPinjam,
        //     'ruangan' => $namaRuangan,
        //     'jumlahruangan' => $jumlahRuangan,
        //     // 'jumlah' => $databulan
        // ]);
        // Session::flash('download.in.the.next.request', 'filetodownload.pdf');
        return $pdf->download('data.pdf');
    }
}
