<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function saveNewUser(Request $request) {
        // return "ok";
        $validateRequest = $request->validate([
            'name' => ['required'],
            'email' => ['required','email:rfc:dns', 'unique:users'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password']
        ]);

        $data = [
            'name' => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ];
        // echo $data;
        $insertingData = User::create($data);
        return redirect('/users/login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required','email:rfc:dns'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'loginError' => 'Login gagal',
        ]);
    }
}
