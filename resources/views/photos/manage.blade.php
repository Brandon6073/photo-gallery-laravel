@extends('layout')
{{-- to use @yield('content') in layout.blade.php  --}}

@section('content')



<x-card class="p-10">
    <a href="{{url()->previous()}}" class="inline-block text-text1 ml-4 mb-4 mt-4"
        ><i class="fa-solid fa-arrow-left"></i> Return
        </a>
        
    <header>
        <h1 class="text-3xl text-center font-bold my-8 uppercase text-text1">
            Manage Photos
        </h1>
    </header>



    <table class="w-full table-auto rounded-sm">
        @unless ($photos->isEmpty())
        <tbody>
            <tr class="px-4 text-text1 font-bold">
                <td class="px-4">Photo</td>
                <td class="px-4">Title</td>
                <td class="px-4">Tags</td>
                <td colspan="2" class="px-4">Description</td>
                <td class="px-4">Action</td>
            </tr>
        </tbody>
        @foreach ($photos as $photo)
            
       
        
        <tbody>
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-text1">
                    <img
                    class=" w-24"
                    src="{{$photo->photo? asset('storage/'. $photo->photo): asset('images/no-image.png')}}" 
                    alt="image"
                />
                </td>

                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-text1">
                    <a href="{{route('photos.show',['photo'=>$photo->id])}}">
                        {{$photo->title}}
                    </a>
                </td>
                
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-text1">
                    
                    <p>{{$photo->tags}}</p>
                    
                </td>
                <td colspan="2" class="px-4 py-8 border-t border-b border-gray-300 text-lg text-text1">
                    <p>{{$photo->description}}</p>
                </td>

                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                    <div>
                        <button class="border bg-green-700 text-text1 rounded-md py-2 px-3 text-xs mt-2 mb-1 hover:bg-green-800">
                            {{-- <a href="/photos/{{$photo->id}}/edit"> --}}
                            <a href="{{route('photos.edit',['photo'=>$photo->id])}}">
                                <i class="fa-solid fa-pencil"></i> Edit</a>
                        </button>
    
                    </div>
                <div>
                    <form method = "POST" action="/photos/{{$photo->id}}">
                        @csrf
                        @method('DELETE')
                        <button class="border bg-red-700 text-text1 rounded-md py-2 px-3 text-xs mb-2 mt-1 hover:bg-red-800"><i class="fa-solid fa-trash"></i> Delete</button>
                    </form>
                </div>


                    
                </td>
            </tr>
            @endforeach
            @else 
            <tr class="border-gray-300">
                <td class="px-4 py-8 border-t border-b border-gray-300 text-lg text-text1">
                    <p class="text-center">No Listings Found</p>
                </td>
            </tr>
            @endunless

        </tbody>
        
    </table>
</x-card>

@endsection