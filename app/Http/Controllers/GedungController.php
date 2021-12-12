<?php

namespace App\Http\Controllers;

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
            'title'     => 'Data Gedung',
            'buildings' => Gedung::all()
        ]);
    }

    public function create(Request $request)
    {
        $building = new Gedung();
        $building->nama_gedung = $request->input('buildingname');
        $building->ket_gedung = $request->input('buildingdescription');
        $building->save();
        return redirect('/gedungList')->with('statusAdd', 'Added data gedung sucessfully !');
    }

    public function showData($id)
    {
        return view('main.gedung.gedung_update', [
            'title' => 'Data Gedung',
            'data' => Gedung::find($id)
        ]);
    }

    public function update(Request $request)
    {
        $data = Gedung::find($request -> id);
        $data->nama_gedung = $request->buildingname;
        $data->ket_gedung = $request->buildingdescription;
        $data->save();
        return redirect('/gedungList')->with('statusUpdate', 'Update data gedung sucessfully');
    }

    public function delete($id)
    {
        $data = Gedung::find($id);
        $data->delete();
        return redirect()->back()->with('statusDelete', 'Delete data gedung sucessfully !');
    }


}
