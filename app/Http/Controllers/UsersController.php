<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class UsersController extends Controller
{
    public function saveNewUser(Request $request) {
        // return "ok";
        $validateRequest = $request->validate([
            'name' => ['required'],
            'email' => ['required','email:rfc:dns', 'unique:users'],
            'username' => ['required', 'alpha_num'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password']
        ]);

        $data = [
            'name' => $request->name,
            "username" => $request->username,
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
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('users/login');
    }

    public function viewCustomize(Request $request) {
        // $user = Auth::user();
        return view('pages.dashboard.profile');
    }
    public function update($id ,Request $request) {
        $user = Auth::user();
        $validateRequest = $request->validate([
            'username' => ['required'],
        ]);
        $data = [
            'username' => $request->username,
            "url_cover_img" => $request->url_cover_img,
            "url_profile_img" => $request->url_profile_img,
            "whatsapp" => $request->whatsapp,
            "nama_toko" => $request->nama_toko,
            "bio" => $request->bio
        ];
        $updatingData = User::find($id)->update($data);

        if ($updatingData) {
            Alert::success('Berhasil', 'Profil berhasil dirubah');
        }
        return redirect('/users/dashboard');
    }
    public function viewShop($username, Request $request) {
        $data = User::where('username', $username)->get();
        if(count($data) < 1) {
            return view('pages.error.notfound');
        }
        $categoriesData = Category::where('user_id', $data[0]->id)->get();
        $productsData = Product::with('categories')->where('user_id', $data[0]->id);
        if ($request->produk) {
            $productsData->where('name', 'like', '%'. $request->produk . '%');
        }
        if ($request->category) {
            $productsData->where('category_id', $request->category);
        }
        // dd($productsData);

        
        return view('pages.mainshop',['users' => $data,'categories' => $categoriesData,'products' => $productsData->get()]);
    }
}
