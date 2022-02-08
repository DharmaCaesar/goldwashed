@extends('preload.default')

@section('container')

<div class="hero min-h-screen bg-base-200">
      <form action="/register-outlet" method="post">
        <div class="text-center hero-content">
          <div class="max-w-md">

            {{-- <h1 class="mb-5 text-5xl font-bold">
                Hello there
              </h1> 
            <p class="mb-5">
                Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.
              </p>  --}}
            
            <div class="card flex-shrink-0 w-full shadow-2xl bg-base-100 mb-5">
                <div class="card-body">
                    @csrf
                    <div class="form-control">
                      <label class="label">
                        <span class="label-text">Fullname</span>
                      </label> 
                      <input type="text" name="name" placeholder="Fullname" class="input input-bordered">
                    </div>
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
                      {{-- <label class="label">
                        <a href="#" class="label-text-alt">Forgot password?</a>
                      </label> --}}
                    </div>
                    

                    <div class="form-control mt-6">
                        <div class="collapse w-96 border rounded-box border-base-300 collapse-arrow">
                            <input type="checkbox"> 
                            <div class="collapse-title text-xl font-medium">
                              Outlet Registration
                            </div> 
                            <div class="collapse-content"> 
                                <div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Outlet Name</span>
                                        </label>
                                        <input type="text" name="outlet_name" placeholder="Outlet name" class="input input-primary input-bordered w-full">
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Outlet Location</span>
                                        </label>
                                        <input type="text" name="outlet_address" placeholder="Location name" class="input input-secondary input-bordered w-full">
                                    </div>
                                    <div class="form-control">
                                        <label class="label">
                                            <span class="label-text">Contact number</span>
                                        </label>
                                        <div class="input-group">
                                            <span>+62</span>
                                            <input type="text" name="outlet_phone" placeholder="Number" class="input input-accent input-bordered w-full">
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div> 
        
                          <div class="collapse w-96 border rounded-box border-base-300 collapse-arrow my-5">
                            <input type="checkbox"> 
                            <div class="collapse-title text-xl font-medium">
                              Admin Regist
                            </div> 
                            <div class="collapse-content"> 
                                <div class="card-body">
                                      <div class="form-control">
                                            <label class="label">
                                            <span class="label-text">Fullname</span>
                                            </label> 
                                            <input type="text" name="admin_name" placeholder="Fullname" class="input input-bordered">
                                      </div>
                                      <div class="form-control">
                                          <label class="label">
                                            <span class="label-text">Username</span>
                                          </label> 
                                          <input type="text" name="admin_username" placeholder="Username" class="input input-bordered">
                                      </div> 
                                      <div class="form-control">
                                            <label class="label">
                                            <span class="label-text">Password</span>
                                            </label> 
                                            <input type="password" name="admin_password" placeholder="password" class="input input-bordered"> 
                                            {{-- <label class="label">
                                            <a href="#" class="label-text-alt">Forgot password?</a>
                                            </label> --}}
                                      </div>
                                </div>
                            </div>
                          </div> 
                    </div>
                  </div>
                </div>
                
                <button type="submit" class="btn btn-outline my-2">Register</button>
              </div>
            </div>
          </div>
          
          
        </div>
      </form>
    </div>
        
    @endsection