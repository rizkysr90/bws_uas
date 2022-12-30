@extends('components.dashboard')
@section('content')
    <div class="card w-full bg-base-100 shadow-xl">
        <div class="card-body">
        <h2 class="card-title">Atur Kategori</h2>
        <p>Disini kamu bisa mengatur kategori untuk produk yang kamu ingin tampilkan</p>
        <div class="card-actions justify-end">
            <a href = "/users/categories" class="btn btn-primary">Atur Sekarang</a>
        </div>
        </div>
    </div>
    <div class="card w-full bg-base-100 shadow-xl mt-4">
        <div class="card-body">
        <h2 class="card-title">Atur Produk</h2>
        <p>Disini kamu bisa mengatur produk yang kamu ingin tampilkan</p>
        <div class="card-actions justify-end">
            <button class="btn btn-primary">Atur Sekarang</button>
        </div>
        </div>
    </div>
@endsection



