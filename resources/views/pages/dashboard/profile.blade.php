@extends('components.dashboard')
@section('content')

    <div class="flex flex-col items-center mt-8">
        <p class="font-bold text-primary text-3xl">Toko Saya</p>
        <div class="card w-full max-w-sm shadow-2xl bg-base-100">
            <form class="card-body" method="POST" action="/api/users/customize/{{ auth()->user()->id}}">
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
                <label class="label" for="username">
                  <span class="label-text" >Username</span>
                </label>
                <input value="{{auth()->user()->username}}" type="text" placeholder="Input your username" id="username" name="username" class="input input-bordered" />
              </div>
              <div class="form-control">
                <label class="label" for="nama_toko">
                  <span class="label-text" >Nama Toko</span>
                </label>
                <input value="{{auth()->user()->nama_toko}}" type="text" placeholder="Input your shop name" id="nama_toko" name="nama_toko" class="input input-bordered" />
              </div>
              <div class="form-control">
                <label class="label" for="url_cover_img">
                    <span class="label-text" >URL Banner Toko</span>
                  </label>
                <input value="{{auth()->user()->url_cover_img}}" type="text" placeholder="Input your url image for ur banner" id="url_cover_img" name="url_cover_img" class="input input-bordered" />
              </div>
              <div class="form-control">
                <label class="label" for="url_profile_img">
                    <span class="label-text" >URL Profile Toko</span>
                  </label>
                <input value="{{auth()->user()->url_profile_img}}" type="text" placeholder="Input your url image for ur banner" id="url_profile_img" name="url_profile_img" class="input input-bordered" />
              </div>
              <div class="form-control">
                <label class="label" for="whatsapp">
                    <span class="label-text" >No. Whatsapp</span>
                  </label>
                <input value="{{auth()->user()->whatsapp}}" type="text" placeholder="Input your url image for ur banner" id="whatsapp" name="whatsapp" class="input input-bordered" />
              </div>
              <div class="form-control">
                <label class="label" for="bio">
                    <span class="label-text" >Description</span>
                  </label>
                <textarea value="{{auth()->user()->bio}}" class="textarea textarea-bordered" id="bio" name="bio" placeholder="Explain your lovely shop"></textarea>
              <div class="form-control mt-6">
                <button class="btn btn-primary text-base-100" type="submit">Simpan Perubahan</button>
              </div>
            </form>
          </div>
    </div>


@endsection