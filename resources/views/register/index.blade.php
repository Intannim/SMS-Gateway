@extends('home')

@section('container')

<div class="row justify-content-center">
  <div class="col-lg-5">
    <main class="form-register w-100 m-auto mt-5">
      <form action="/register" method="post">
        @csrf
        <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
          <div class="grid flex justify-center">
              <div class="p-6">
        <h5 class="mt-3 mb-2 fw-normal text-center">Registration Form</h5>
  
        <div class="form-floating">
          <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" placeholder="name" required value="{{  old ('name') }}">
          <label for="name">Name</label>
          @error('name')
          <div class="invalid-feedback">
             {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{  old ('email') }}">
          <label for="email">Email address</label>
          @error('email')
          <div class="invalid-feedback">
             {{ $message }}
          </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" placeholder="Password" required >
          <label for="password">Password</label>
          @error('password')
          <div class="invalid-feedback">
             {{ $message }}
          </div>
          @enderror
        </div>


        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
      </form>

      <small class="d-block text-center mt-3">Already have an account? <a href="/login"> Sign In here</a></small>
    </main>
  </div>
</div>


@endsection


