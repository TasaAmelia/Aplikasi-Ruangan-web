<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }


    public function auth(Request $request)
    {
        $credentials = $request -> validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('LoginError', 'Login failed!');
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }


    // public function show($id)
    // {
    //     return view('auth.cPassword', [
    //         'title' => 'Change Password',
    //         'user' => User::find($id)
    //     ]);
    // }


    // public function changePassword(Request $request)
    // {
    //     if(!(Hash::check($request->get('old_password'), Auth::user()->password)))
    //     {
    //         return back()->with('CpassError', 'Your old password not match');
    //     }
    //     if(strcmp($request->get('old_password'), $request->get('new_password')) == 0)
    //     {
    //         return back()->with('CpassError', 'Your new password cannot be same with old password');
    //     }

    //     $request->validate([
    //         'old_password' => 'required',
    //         'new_password' => 'required|min:4'
    //     ]);

    //     $user = User::find($request->username);
    //     $user->password = bcrypt($request->get('new_password'));
    //     // dd($user);
    //     $user->save();

    //     return back()->with('success', 'Password change sucessfully');
    // }

}
