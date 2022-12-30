@extends('components.main')

@section('base')
    <div class=" min-h-screen">
        <div class="hero min-h-screen bg-base-200">
            <div class="hero-content flex-col ">
              <div class="text-center">
                <h1 class="text-5xl font-bold">Login now</h1>
                <p class="py-6">Mulai Dirimu Sekarang!</p>
              </div>
              <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
                <form class="card-body" method="POST" action="/auth/login">
                    @csrf
                  <div class="form-control">
                    <label class="label" for="email">
                        <span class="label-text" >Email*</span>
                      </label>
                    <input type="email" placeholder="Input your valid email" id="email" name="email" class="input input-bordered" />
                  </div>
                  <div class="form-control">
                    <label class="label" for="password">
                        <span class="label-text" >Password*</span>
                      </label>
                    <input type="password" placeholder="Input your password" id="password" name="password" class="input input-bordered" />
                  </div>
                  <div class="form-control mt-6">
                    <button class="btn btn-primary">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
    </div>
@endsection