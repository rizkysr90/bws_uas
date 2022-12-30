@extends('components.dashboard')
@section('content')

    <div class="flex flex-col items-center mt-8">
        <p class="font-bold text-primary text-3xl">Edit Kategori</p>
        <div class="card w-full max-w-sm shadow-2xl bg-base-100">
            <form class="card-body" method="POST" action="/api/categories/update/{{$data[0]->id}}">
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
                  <span class="label-text" >Nama Kategori</span>
                </label>
                <input value={{$data[0]->name}} type="text" placeholder="Input your name category" id="name" name="name" class="input input-bordered" />
              </div>
              <div class="form-control">
                <label class="label" for="url_img">
                    <span class="label-text" >URL Gambar</span>
                  </label>
                <input value={{$data[0]->url_img}} type="text" placeholder="Input your url image for category" id="url_img" name="url_img" class="input input-bordered" />
              </div>
              <div class="form-control mt-6">
                <button class="btn btn-primary text-base-100" type="submit">Simpan Perubahan</button>
              </div>
            </form>
          </div>
    </div>


@endsection