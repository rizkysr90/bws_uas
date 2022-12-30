@extends('components.dashboard')
@section('content')

    <div class="flex flex-col items-center mt-8">
        <p class="font-bold text-primary text-3xl">Tambah Produk</p>
        <div class="card w-full max-w-sm shadow-2xl bg-base-100">
            <form class="card-body" method="POST" action="/api/products">
              @csrf
                @if ($errors->any())
                    <div class="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
              <div class="form-control">
                <label class="label" for="name">
                  <span class="label-text" >Nama Produk</span>
                </label>
                <input type="text" placeholder="Indomie Original" id="name" name="name" class="input input-bordered" />
              </div>
              <div class="form-control">
                <label class="label" for="category_id">
                  <span class="label-text" >Pilih Kategori</span>
                </label>
                <select class="select select-bordered w-full" id="category_id" name="category_id">
                    <option disabled selected>Pilih Kategori</option>
                    @foreach ($categories as $data)
                        <option value={{ $data->id }}>{{ $data->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-control">
                  <label class="label" for="modal">
                      <span class="label-text" >Harga Modal</span>
                    </label>
                    <input type="number" placeholder="Ex: Rp5000" id="modal" name="modal" class="input input-bordered" />
                </div>
                <div class="form-control">
                    <label class="label" for="harga_jual">
                        <span class="label-text" >Harga Jual</span>
                    </label>
                    <input type="number" placeholder="Ex: Rp10000" id="harga_jual" name="harga_jual" class="input input-bordered" />
                </div>
                <div class="form-control">
                    <label class="label" for="stock">
                        <span class="label-text" >Stok Produk</span>
                    </label>
                    <input type="number" placeholder="Ex: 99" id="stock" name="stock" class="input input-bordered" />
                </div>
                <div class="form-control">
                  <label class="label" for="url_img">
                      <span class="label-text" >URL Gambar</span>
                    </label>
                  <input type="text" placeholder="https:://placeimg.com" id="url_img" name="url_img" class="input input-bordered" />
                </div>
                <div class="form-control">
                <label class="label" for="description">
                    <span class="label-text" >Description</span>
                  </label>
                <textarea class="textarea textarea-bordered" id="description" name="description" placeholder="Explain your lovely product"></textarea>
              </div>
              <div class="form-control mt-6">
                <button class="btn btn-primary text-base-100" type="submit">Tambah</button>
              </div>
              
            </form>
          </div>
    </div>


@endsection