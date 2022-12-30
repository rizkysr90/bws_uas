@extends('components.shop')

@section('content')
    <div class="text-black">
        <figure>
            @if ($users[0]->url_cover_img === null)
                <img class ="h-56 w-full" src="https://ik.imagekit.io/rizkysr90/vecteezy_icon-image-not-found-vector__2xfvvap08.jpg" alt="gambar produk" />
            @else
                <img class="h-56 w-full" src={{$users[0]->url_cover_img}}/>
            @endif
        </figure>
        <div class="flex flex-col text-neutral pb-8 px-8 border-primary border-b items-center">
            <div class="avatar -mt-10">
                <div class="w-24 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                    @if ($users[0]->url_profile_img === null)
                        <img class ="" src="https://ik.imagekit.io/rizkysr90/vecteezy_icon-image-not-found-vector__2xfvvap08.jpg" alt="gambar produk" />
                    @else
                        <img class="" src={{$users[0]->url_profile_img}}/>
                    @endif
                </div>
            </div>
            @if ($users[0]->bio === null)
                <p class="my-4 text-center">Selamat datang di katalog online {{ $users[0]->nama_toko }}</p>
            @else
                <p class="my-4 text-center">{{$users[0]->bio}}</p>
            @endif
            @if ($users[0]->whatsapp !== null)
                <a class="btn btn-primary btn-lg text-base-100" href="https://wa.me/{{$users[0]->whatsapp}}" target="_blank">Hubungi Via Whatsapp</a>
            @endif
        </div>
        <p class="font-bold text-3xl my-6 text-primary text-center">Produk Kami</p>

        <div class="px-4 pb-10">
            <form class="form-control w-full" method="GET" action="/{{$users[0]->username}}">
                <label for="category">
                    <span class="text-primary text-xs">Kategori</span>
                </label>
                <div class="input-group w-full bg-secondary">
                  <select class="select select-bordered grow" id="category" name="category">
                    <option disabled selected>Pilih Kategori</option>
                    @foreach ($categories as $category)
                        <option value={{ $category->id }}>{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
                <label for="produk">
                    <span class="text-primary text-xs">Nama produk</span>
                </label>
                <div class="input-group">
                  <input id="produk" name="produk" type="text" placeholder="Cari berdasarkan nama produk" class="input grow input-bordered" />
                </div>
                <button class="btn btn-primary text-base-100 mt-4">Cari</button>
            </form>
            @If (count($products) === 0) 
                <p class=" text-center mt-4 text-neutral">Belum ada produk</p>
            @endif
            <div class="flex mt-4 flex-wrap justify-center">
                @foreach($products as $product)
                    <div class="card card-compact m-2 basis-5/12 grow bg-base-100 shadow-xl ">
                        <figure>
                            @if ($product->url_img === null)
                                <img src="https://ik.imagekit.io/rizkysr90/vecteezy_icon-image-not-found-vector__2xfvvap08.jpg" alt="Gambar Produk" />
                            @else
                                <img src="{{ $product->url_img}}" alt="Gambar Produk" />
                            @endif
                        </figure>
                        <div class="card-body">
                            <h2 class="card-title">{{ $product->name }}</h2>
                            <p class="text-primary"><span class="">Harga :</span> Rp{{ $product->harga_jual }}</p>
                            <p class="text-primary"><span class="">Stok :</span>{{ $product->stock }}</p>
                            <div class="badge badge-secondary text-neutral">{{ $product->categories->name }}</div>
                            <a class="btn btn-primary text-base-100 mt-2" 
                            target="_blank"
                            href="https://wa.me/{{$users[0]->whatsapp}}?text=Hi%20apakah%20produk%20{{$product->name}}%20masih%20ada?%20">Whatsapp</a>
                           
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection