<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Product;
use App\Models\Category;


class ProductsController extends Controller
{
    //
    public function create(Request $request) {
        $user = Auth::user();

        $validateRequest = $request->validate([
            'name' => ['required'],
            'category_id' => ['required']

        ]);
        $data = [
            'name' => $request->name,
            "url_img" => $request->url_img,
            "modal" => $request->modal,
            "harga_jual" => $request->harga_jual,
            "stock" => $request->stock,
            "description" => $request->description,
            "category_id" => $request->category_id,
            "user_id" => $user->id
        ];
        $insertingData = Product::create($data);
        if ($insertingData) {
            Alert::success('Berhasil', 'Produk berhasil ditambahkan');
        }
        return redirect('/users/products');

    }
    public function addView() {
        $user = Auth::user();
        $categories = Category::where('user_id', $user->id)
                            ->get();
        return view(
            'pages.dashboard.addproduct',
            [
                "categories" => $categories
            ]
            );
    }
    public function view() {
        $user = Auth::user();
        $data = Product::orderBy('name')->where('user_id', $user->id);
        return view('pages.dashboard.products',[
            "products" => $data->get()    
            ]
        );
    }
    public function delete($id) {
        $deleteData = Product::where('id', $id)->delete();
        if ($deleteData) {
            Alert::success('Berhasil', 'Produk berhasil dihapus');
        }
        return redirect('/users/products');

    }
    public function updateView($id) {
        $user = Auth::user();

        $categories = Category::where('user_id', $user->id)
        ->get();
        $data = Product::where('id', $id)->get();
        return view('pages.dashboard.updateproduct',["data" => $data,"categories" => $categories]);
    }
    public function update(Request $request,$id) {
        $user = Auth::user();

        $validateRequest = $request->validate([
            'name' => ['required'],
            'category_id' => ['required']
        ]);
        $data = [
            'name' => $request->name,
            "url_img" => $request->url_img,
            "modal" => $request->modal,
            "harga_jual" => $request->harga_jual,
            "stock" => $request->stock,
            "description" => $request->description,
            "category_id" => $request->category_id,
            "user_id" => $user->id
        ];
        $updatingData = Product::find($id)->update($data);
        if ($updatingData) {
            Alert::success('Berhasil', 'Produk berhasil dirubah');
        }
        return redirect('/users/products');
    }
}
