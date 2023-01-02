@extends('components.main')

@section('base')
    <div class="bg-base-100 relative min-h-screen pb-24">
        {{-- Navbar --}}
        <div class="navbar bg-primary text-base-100 flex justify-between">
            <a class="btn btn-ghost normal-case text-xl">{{ $users[0]->nama_toko }}</a>
        </div>
        @yield('content')
        <footer class="footer absolute bottom-0 footer-center p-4 bg-primary text-base-100">
            <div>
              <p>Made with ♥ By EZCatalog - BWS UAS 2023</p>
            </div>
          </footer>
    </div>
@endsection