<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class UserController extends Controller
{
    public function add()
    {
        return view('main.user.user_formAdd', [
            'title'     => 'Add User',
            'mainTitle' => 'User',
            'user' => User::all()
        ]);
    }


    public function create(Request $request)
    {
        $user = new User();
        $user->username = $request->input('username');
        $user->password = password_hash($request->input('usertype'), PASSWORD_DEFAULT);
        $user->usertype = $request->input('usertype');
        $user->fullname = $request->input('fullname');
        $user->save();
        return redirect('/userList')->with('statusAdd', 'Added data sucessfully !');
    }


    public function read(Request $request)
    {
        return view('main.user.user_list', [
            'title'     => 'User',
            'users'     => User::paginate(10)->withQueryString()
        ])->with('i', ($request->input('page', 1) - 1) * 10);
    }


    public function showData($id)
    {
        return view('main.user.user_formUpdate', [
            'title' => 'Update User',
            'mainTitle' => 'User',
            'data' => User::find($id)
        ]);
    }


    public function update(Request $request)
    {
        $data = User::find($request -> id);
        $data->username = $request->username;
        $data->fullname = $request->fullname;
        $data->usertype = $request->usertype;
        $data->save();
        return redirect('/userList')->with('statusUpdate', 'Update data sucessfully');
    }


    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->back()->with('statusDelete', 'Delete data sucessfully !');
    }

}
