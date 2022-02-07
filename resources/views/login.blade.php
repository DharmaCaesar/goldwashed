@extends('preload.default')

@section('container')
<div class="hero min-h-screen bg-base-200">
    <div class="flex-col justify-center hero-content lg:flex-row">
      <div class="text-center lg:text-left">
        <h1 class="mb-5 text-5xl font-bold">
              Grubbywash
            </h1> 
        <p class="mb-5">
              Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.
            </p>
      </div> 
      <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
        <div class="card-body">
          <form action="/login" method="post">
            @csrf
            <div class="form-control">
              <label class="label">
                <span class="label-text">Username</span>
              </label> 
              <input type="text" name="username" placeholder="Username" class="input input-bordered">
            </div> 
            <div class="form-control">
              <label class="label">
                <span class="label-text">Password</span>
              </label> 
              <input type="password" name="password" placeholder="password" class="input input-bordered"> 
              <label class="label">
                <a href="#" class="label-text-alt">Forgot password?</a>
              </label>
            </div> 
            <div class="form-control mt-6">
              <button type="submit" class="btn btn-primary">Login</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection