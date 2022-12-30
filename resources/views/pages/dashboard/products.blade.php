@extends('components.dashboard')
@section('content')
<div class="mt-4 px-4">
    
        <a href= "/products/viewAdd" class="btn mt-4 w-full mx-auto btn-primary text-base-100 btn-lg ">
            Tambah Produk
        </a>
        <p class="font-bold text-3xl text-neutral mt-4 text-center">Produk Saya</p>
        @If (count($products) === 0) 
            <p class=" text-center mt-4 text-neutral">Data masih kosong</p>
        @endif
        <div class="mt-4">
            @foreach ($products as $data)
                {{-- <div class="flex btn btn-lg normal-case btn-secondary my-2 justify-between">
                    <p class="">{{ $data['name'] }}</p>
                    <div class="flex">
                        <a href = "/api/categories/update/{{$data['id']}}" class="btn btn-sm btn-warning text-base-100 mx-1">Edit</a>
                        <a href='/api/categories/delete/{{$data['id']}}' class="btn btn-sm btn-info text-neutral mx-1">Hapus</a>
                    </div>
                </div> --}}
                <div class="border border-primary bg-base-100 my-3 rounded-md p-2">
                    <div class="flex ">
                        <figure class="mr-2">
                            {{-- {{dd($data)}} --}}
                            @if ($data['url_image'] === null)
                                <img class ="h-16 object-cover w-full" src="https://ik.imagekit.io/rizkysr90/vecteezy_icon-image-not-found-vector__2xfvvap08.jpg" alt="gambar produk" />
                            @else
                                <img class ="h-32 object-cover w-full" src={{$data['url_image']}}  alt="gambar produk" />
                              
                            @endif
                        </figure>
                        <div class="flex flex-col">
                            <p class="text-neutral text-lg font-bold">{{$data['name']}}</p>
                            <div class="flex">
                                <p class="text-neutral text-lg mr-4"><span class="badge badge-primary">Modal</span>Rp{{$data['modal']}}</p>
                                <p class="text-neutral text-lg mr-4"><span class="badge badge-secondary">Jual</span>Rp{{$data['harga_jual']}}</p>
                                <p class="text-neutral text-lg "><span class="badge badge-info">Stok</span> {{$data['harga_jual']}}</p>
    
                            </div>
                        </div>
                        
                    </div>
                    <div class="flex mt-2">
                        <a href="/products/viewUpdate/{{$data['id']}}" class="btn btn-warning btn-outline grow mr-3">Edit</a>
                        <a href="/api/products/delete/{{$data['id']}}" class="btn btn-error btn-outline grow">Hapus</a>
    
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection