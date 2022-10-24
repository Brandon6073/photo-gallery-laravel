@extends('layout')
{{-- to use @yield('content') in layout.blade.php  --}}

@section('content')
<x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1 text-text1">
            Login
        </h2>
    </header>

    <form method="POST" action="/users/authenticate">
        {{-- action is different then the rest due to it not being a crud functionality --}}
        @csrf

        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2  text-text1"
                >Email</label
            >
            <input
                type="email"
                class="border border-gray-200 rounded p-2 w-full bg-text1"
                name="email"
                value="{{old('email')}}"
            />

            @error('email')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
            
        </div>

        <div class="mb-6">
            <label
                for="password"
                class="inline-block text-lg mb-2  text-text1"
            >
                Password
            </label>
            <input
                type="password"
                class="border border-gray-200 rounded p-2 w-full bg-text1"
                name="password"
                value="{{old('password')}}"
            />

            @error('password')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

        </div>

        <div class="mb-6">
            <button
                type="submit"
                class="bg-color3 text-white rounded py-2 px-4 hover:bg-color2"
            >
                Sign In
            </button>
        </div>

        <div class="mt-8  text-text1">
            <p>
                Don't have an account?
                <a href="{{route('users.create')}}" class="text-blue-500 hover:text-blue-200"
                    >Register</a
                >
            </p>
        </div>
    </form>
</x-card>
@endsection