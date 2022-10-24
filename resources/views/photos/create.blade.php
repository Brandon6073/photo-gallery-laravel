@extends('layout')
{{-- to use @yield('content') in layout.blade.php  --}}

@section('content')
<a href="{{url()->previous()}}" class="inline-block text-text1 ml-4 mb-4 mt-4"
    ><i class="fa-solid fa-arrow-left"></i> Return
    </a>
    
<x-card class="p-10 max-w-lg mx-auto mt-24">

<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1 text-text1">
        Post a Photo
    </h2>
    <p class="mb-4 text-text1">Share your photo</p>
</header>

<form method ="POST" action="/photos" enctype="multipart/form-data">
    {{-- action placed same as in the route  --}}
    @csrf

    
    <div class="mb-6">
        <label for="photo" class="inline-block text-lg mb-2 text-text1">
            Photo
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full bg-text1 "
            name="photo"
        />
        @error('photo')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            
        @enderror
    </div>
    
    <div class="mb-6">
        <label for="title" class="inline-block text-lg mb-2 text-text1"
            > Title</label
        >
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full bg-text1 placeholder:text-slate-500 placeholder:italic"
            name="title"
            placeholder="Example: Mona Lisa"
            value="{{old('title')}}"
        />
        @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            {{-- message in PhotoController --}}
        @enderror
    </div>

    <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2 text-text1">
            Tags (Comma Separated)
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full bg-text1 placeholder:text-slate-500 placeholder:italic"
            name="tags"
            placeholder="Example: cat, animal, dog, etc"
            value="{{old('tags')}}"
        />

        @error('tags')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            
        @enderror
    </div>

    <div class="mb-6">
        <label
            for="description"
            class="inline-block text-lg mb-2 text-text1"
        >
            Photo Description
        </label>
        <textarea
            class="border border-gray-200 rounded p-2 w-full bg-text1 placeholder:text-slate-500 placeholder:italic"
            name="description"
            rows="10"
            placeholder="Description about the photo"
        >{{old('desciption')}}</textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1 ">{{$message}}</p>
            
        @enderror
    </div>

    <div class="mb-6">
        <button
            class="bg-color3 text-white rounded py-2 px-4 hover:bg-color2"
        >
            Post Photo
        </button>

    </div>
</form>
</x-card>
@endsection