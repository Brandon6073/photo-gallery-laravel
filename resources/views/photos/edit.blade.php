@extends('layout')
{{-- to use @yield('content') in layout.blade.php  --}}

@section('content')

<a href="{{url()->previous()}}" class="inline-block text-text1 ml-4 mb-4 mt-4"
    ><i class="fa-solid fa-arrow-left"></i> Return
    </a>
    
<x-card class="p-10 max-w-lg mx-auto mt-24">

<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1 text-text1">
        Edit Photo Details
    </h2>
    <p class="mb-4  text-text1">Update Photo</p>
</header>

<form method ="POST" action="/photos/{{$photo->id}}" enctype="multipart/form-data">
    {{-- action placed same as in the route  --}}
    @csrf
    @method('PUT')
    {{-- html method can only be post or get  --}}

    <div class="mb-6">

        <img
        class=" w-48 mb-6"
        src="{{$photo->photo? asset('storage/'. $photo->photo): asset('images/no-image.png')}}" 
        alt=""
    />

        <label for="photo" class="inline-block text-lg mb-2 text-text1">
            Photo
        </label>
        <input
            type="file"
            class="border border-gray-200 rounded p-2 w-full bg-text1"
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
            class="border border-gray-200 rounded p-2 w-full bg-text1"
            name="title"
            placeholder="Example: Mona Lisa"
            value="{{$photo->title}}"
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
            class="border border-gray-200 rounded p-2 w-full bg-text1"
            name="tags"
            placeholder="Example: cat, animal, dog, etc"
            value="{{$photo->tags}}"
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
            class="border border-gray-200 rounded p-2 w-full bg-text1"
            name="description"
            rows="10"
            placeholder="Description about the photo"
        >{{$photo->description}}</textarea>

        @error('description')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            
        @enderror
    </div>

    <div class="mb-6">
        <button
            class="bg-color3 text-white rounded py-2 px-4 hover:bg-color2"
        >
            Update Photo
        </button>
    </div>
</form>
</x-card>
@endsection