<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Gedung;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    public function index(Request $request) {
        return view('main.gedung.gedung_list', [
            'title' => 'Data Gedung',
            'buildings' => Gedung::paginate(10)->withQueryString()
            ])->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function add() {
        return view('main.gedung.gedung_add', [
            'title'     => 'Tambah Gedung',

        ]);
    }

    public function create(Request $request)
    {
        $building = new Gedung();
        $building->nama_gedung = $request->input('buildingname');
        $building->ket_gedung = $request->input('buildingdescription');
        $building->save();
        return redirect('/')->with('statusAdd', 'Added data sucessfully !');
    }

    public function showData($id)
    {
        return view('gedung.gedung_update', [
            'title' => 'Update Gedung',
            'mainTitle' => 'Gedung',
            'data' => Building::find($id)
        ]);
    }


    public function update(Request $request)
    {

    }


    public function delete($id)
    {
        $data = Gedung::find($id);
        $data->delete();
        return redirect()->back()->with('statusDelete', 'Delete data sucessfully !');
    }


}
