@extends('layout')
{{-- to use @yield('content') in layout.blade.php  --}}

@section('content')

<a href="{{url()->previous()}}" class="inline-block text-text1 ml-4 mb-4 mt-4"
><i class="fa-solid fa-arrow-left"></i> Return
</a>
<div class="mx-10 py-10">
<x-card>
    <div class="flex flex-col items-center justify-center text-center">
        <img
            class="w-50 mr-6 mb-6 mt-6"
            src="{{$photo->photo? asset('storage/'. $photo->photo): asset('images/no-image.png')}}" 
            alt="image"
        />

        <h3 class="text-3xl mb-2 text-text1 font-bold">{{$photo->title}}</h3>
        @auth
        @if ($photo->user_id == auth()->user()->id)
            {{-- edit and delete button  --}}
            <div class="lg:grid lg:grid-cols-2 gap-10 w-1/2 space-y-4 md:space-y-0 mx-20">
                <div>
                    <button class="border bg-green-700 text-text1 rounded-md py-2 px-3 text-xs m-2 hover:bg-green-800">
                        <a href="{{route('photos.edit',['photo'=>$photo->id])}}">
                            <i class="fa-solid fa-pencil"></i> Edit</a>
                    </button>

                </div>

                <div>
                    <form method = "POST" action="/photos/{{$photo->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="border bg-red-700 text-text1 rounded-md py-2 px-3 text-xs m-2 hover:bg-red-800"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                </div>

            </div>
    
        @endif
        @endauth



        <div class="border border-slate-500 w-full mb-2 mt-2 w-5/6" ></div>

        <x-photo-tags :tagsCsv='$photo->tags' />

 
            
        <div class="flex flex-col items-center justify-center text-center">
            <h3 class="text-2xl mb-2 text-text1">
                Description
            </h3>
            <div class="text-lg space-y-6 text-text1 w-4/5 ">
                <p>
                    {{$photo->description}}
                </p>
            </div>
        </div>

        <div class="mt-4 mb-3">
            <a href="{{URL::to('storage/'. $photo->photo)}}" target="_blank" download>
                <button class="border bg-color3 text-text1 rounded-md py-2 px-3 m-2 text-xl hover:bg-color2"><i class="fa fa-download"></i> Download</button>
            </a>
        </div>


    </div>

</div>
</x-card>



</div>

@endsection