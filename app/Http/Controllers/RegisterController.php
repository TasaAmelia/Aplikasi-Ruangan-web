<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register',
            'active' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request -> validate([
            'username' => 'required|max:12|unique:users',
            'password' => 'required|min:4',
            'usertype' => 'required',
            'fullname' => 'required'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('succes', 'Registration sucessfull! Please login');

        return redirect('/login');
    }
}
