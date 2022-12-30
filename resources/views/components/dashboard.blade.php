@extends('components.main')

@section('base')
    <div class="bg-base-100 relative min-h-screen pb-24">
        <div class="btm-nav bg-base-100  text-primary absolute bottom-0 ">
            <a href="/users/dashboard" class="text-base-100 bg-primary active">
                Home
            </a>
            <button class="">
                See Catalog
            </button>
            <button class="">
                Customize Shop
            </button>
        </div>
        {{-- Navbar --}}
        <div class="navbar bg-primary text-base-100">
            <a class="btn btn-ghost normal-case text-xl">EzCatalog</a>
        </div>
        @yield('content')

        {{-- <p class="text-black">{{auth()->user()->name}}</p> --}}
    </div>

@endsection



