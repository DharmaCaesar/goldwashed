@extends('preload.default')

@section('container')
    @include('partials.navbar')

    {{-- BAGIAN TESTING HOME WALL --}}
    {{-- <img src="{{ asset('ingredient/patterngrubby.png') }}"> --}}
    {{-- BAGIAN TESTING HOME WALL --}}

    {{-- BAGIAN AWAL HOMEPAGE --}}
    {{-- <div class="flex"> --}}

    {{-- <div class="hero min-h-screen bg-base-200">
        <div class="hero-content text-center">
            
        </div>
    </div> --}}

    <div class="card flex flex-row text-center shadow-2xl p-5 min-h-screen items-center"
                style="background-image: url({{ asset('ingredient/patterngrubby.png') }})">
                <figure class="px-10 min-h-full">
                    <img src="{{ asset('ingredient/machine.png') }}" class="rounded-2xl p-2 bg-base-100 outline outline-3 outline-blue-300 shadow-2xl">
                </figure>
                <div class="card-body rounded-xl flex-shrink-0 w-full max-w-xl shadow-2xl bg-base-100 max-h-80 outline outline-3 outline-blue-300">
                    <h2 class="card-title flex-1">shadow, center, padding</h2>
                    <p>Rerum reiciendis beatae tenetur excepturi aut pariatur est eos. Sit sit necessitatibus veritatis sed
                        molestiae voluptates incidunt iure sapiente.</p>
                    <div class="justify-center card-actions">
                        <button class="btn btn-accent">More info</button>
                    </div>
                </div>
            </div>

    {{-- <div class="card shadow-xl image-full">
        <figure>
            <img src="{{ asset('ingredient/pcs.jpg') }}">
        </figure>
        <div class="card-body">
            <h2 class="card-title justify-end">Image overlay</h2>
            <p class="text-right">Rerum reiciendis beatae tenetur excepturi aut pariatur est eos. Sit sit necessitatibus
                veritatis sed molestiae voluptates incidunt iure sapiente.</p>
            <div class="card-actions justify-end">
                <button class="btn btn-outline btn-primary">Get Started</button>
            </div>
        </div>
    </div>

    <div class="card shadow-sm bg-accent text-accent-content">
        <figure>
            <img src="{{ asset('ingredient/tumbler.jpg') }}">
        </figure>
        <div class="card-body">
            <h2 class="card-title">Accent color</h2>
            <p>Rerum reiciendis beatae tenetur excepturi aut pariatur est eos. Sit sit necessitatibus veritatis sed
                molestiae voluptates incidunt iure sapiente.</p>
            <div class="card-actions">
                <button class="btn btn-secondary">More info</button>
            </div>
        </div>
    </div> --}}
    {{-- BAGIAN AKHIR HOMEPAGE --}}
    @include('partials.footer')
@endsection
