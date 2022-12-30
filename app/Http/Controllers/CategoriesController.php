<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;


class CategoriesController extends Controller
{
    public function create(Request $request) {
        $user = Auth::user();

        $validateRequest = $request->validate([
            'name' => ['required'],
        ]);
        $data = [
            'name' => $request->name,
            "url_img" => $request->url_img,
            "user_id" => $user->id
        ];
        $insertingData = Category::create($data);
        if ($insertingData) {
            Alert::success('Berhasil', 'Kategori berhasil ditambahkan');
        }
        return redirect('/users/categories');

    }
    public function view() {
        $dataCategories = Category::orderBy('name');
        // dd($yourdata) untuk debugging
        return view('pages.dashboard.categories',
            [
                "categories" => $dataCategories->get()
            ]
        );
        
    }
    public function delete($id) {
        $deleteData = Category::where('id', $id)->delete();
        if ($deleteData) {
            Alert::success('Berhasil', 'Kategori berhasil dihapus');
        }
        return redirect('/users/categories');

    }

    public function updateView($id) {
        
        $data = Category::where('id', $id)->get();
        return view('pages.dashboard.editcategory',["data" => $data]);
    }

    public function update(Request $request,$id) {
        $user = Auth::user();

        $validateRequest = $request->validate([
            'name' => ['required'],
        ]);
        $data = [
            'name' => $request->name,
            "url_img" => $request->url_img,
            "user_id" => $user->id
        ];
        $updatingData = Category::find($id)->update($data);
        if ($updatingData) {
            Alert::success('Berhasil', 'Kategori berhasil dirubah');
        }
        return redirect('/users/categories');
    }
}
