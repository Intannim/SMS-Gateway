@extends('home')

@section('container')

<div class="row justify-content-center">
  <div class="col-lg-4">
    
    
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    <main class="form-signin w-100 m-auto mt-5">
        <form method="POST" action="{{ route('login') }}">
            @csrf
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
          <div class="grid flex justify-center">
              <div class="p-6">
        <h5 class="mt-3 mb-2 fw-normal text-center">Please sign in</h5>
    
        <div class="form-floating">
          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
          <label for="email">Email address</label>
          @error('email')
          <div class="invalid-feedback">
             {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
          <label for="password">Password</label>
        </div>
        <button type="submit" class="w-100 btn btn-lg btn-primary">
            {{ __('Login') }}
        </button>
              </form>

      <small class="d-block text-center mt-3">Don't have an account? <a href="/register"> Register Now ! </a></small>
      <small class="d-block text-center mt-3"><a href="/"> Forgot password? </a></small>

    </main>
  </div>
</div>


@endsection
