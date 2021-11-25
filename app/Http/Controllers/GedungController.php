<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class GedungController extends Controller
{
    public function index(Request $request) {
        return view('gedung.gedung_list', [
            'title' => 'Data Gedung',
            'buildings' => Building::paginate(10)->withQueryString()
            ])->with('i', ($request->input('page', 1) - 1) * 10);
    }

    public function add() {
        return view('gedung.gedung_add', [
            'title'     => 'Tambah Gedung',
            'mainTitle' => 'Gedung',
            'buildings' => Building::all()
        ]);
    }

    public function create(Request $request)
    {
        $building = new Building();
        $building->buildingname = $request->input('buildingname');
        $building->buildingdescription = $request->input('buildingdescription');
        $building->save();
        return redirect('/')->with('statusAdd', 'Added data sucessfully !');
    }

    // public function showData($id)
    // {
    //     return view('user.user_formUpdate', [
    //         'title' => 'Update User',
    //         'mainTitle' => 'User',
    //         'data' => Building::find($id)
    //     ]);
    // }


    // public function update(Request $request)
    // {
    //     $data = Building::find($request -> id_gedung);
    //     $data->username = $request->username;
    //     $data->fullname = $request->fullname;
    //     $data->usertype = $request->usertype;
    //     $data->save();
    //     return redirect('/userList')->with('statusUpdate', 'Update data sucessfully');
    // }


    public function delete($id)
    {
        $data = Building::find($id);
        $data->delete();
        return redirect()->back()->with('statusDelete', 'Delete data sucessfully !');
    }


}
