@extends('components.dashboard')
@section('content')
    <div class="mt-4 px-4">
        <a href= "/categories/add" class="btn btn-primary text-base-100 btn-lg w-full">
            Tambah Kategori
        </a>
        @If (count($categories) === 0) 
            <p class="text-neutral">Data masih kosong</p>
        @endif
        <p class="font-bold text-xl text-neutral mt-4">List kategori kamu : </p>
        @foreach ($categories as $data)
            <div class="flex btn btn-lg normal-case btn-secondary my-2 justify-between">
                <p class="">{{ $data['name'] }}</p>
                <div class="flex">
                    <a href = "/api/categories/update/{{$data['id']}}" class="btn btn-sm btn-warning text-base-100 mx-1">Edit</a>
                    <a href='/api/categories/delete/{{$data['id']}}' class="btn btn-sm btn-info text-neutral mx-1">Hapus</a>
                </div>
            </div>
        @endforeach
    </div>

@endsection