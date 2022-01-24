@extends('preload.default')

@section('container')
@include('partials.navbar')

{{-- BAGIAN TESTING HOME WALL --}}
{{-- <img src="{{ asset('ingredient/salmon.png') }}"> --}}
{{-- BAGIAN TESTING HOME WALL --}}

{{-- BAGIAN AWAL HOMEPAGE --}}
{{-- <div class="flex"> --}}
<div class="card text-center shadow-2xl">
  <figure class="px-10 pt-10">
    <img src="{{ asset("ingredient/salmon.png") }}" class="rounded-xl">
  </figure> 
  <div class="card-body">
    <h2 class="card-title">shadow, center, padding</h2> 
    <p>Rerum reiciendis beatae tenetur excepturi aut pariatur est eos. Sit sit necessitatibus veritatis sed molestiae voluptates incidunt iure sapiente.</p> 
    <div class="justify-center card-actions">
      <button class="btn btn-outline btn-accent">More info</button>
    </div>
  </div>
</div> 

<div class="card shadow-xl image-full">
  <figure>
    <img src="{{ asset("ingredient/pcs.jpg") }}">
  </figure> 
  <div class="justify-end card-body">
    <h2 class="card-title">Image overlay</h2> 
    <p>Rerum reiciendis beatae tenetur excepturi aut pariatur est eos. Sit sit necessitatibus veritatis sed molestiae voluptates incidunt iure sapiente.</p> 
    <div class="card-actions">
      <button class="btn btn-primary">Get Started</button>
    </div>
  </div>
</div> 

<div class="card shadow-sm bg-accent text-accent-content">
  <figure>
    <img src="{{ asset("ingredient/tumbler.jpg") }}">
  </figure> 
  <div class="card-body">
    <h2 class="card-title">Accent color</h2> 
    <p>Rerum reiciendis beatae tenetur excepturi aut pariatur est eos. Sit sit necessitatibus veritatis sed molestiae voluptates incidunt iure sapiente.</p> 
    <div class="card-actions">
      <button class="btn btn-secondary">More info</button>
    </div>
  </div>
</div>
</div>
{{-- BAGIAN AKHIR HOMEPAGE --}}

@endsection