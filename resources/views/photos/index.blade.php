@extends('layout')
{{-- to use @yield('content') in layout.blade.php  --}}

@section('content')
@include('partials._hero')



<div class="lg:grid lg:grid-cols-3 gap-8 space-y-4 md:space-y-0 mx-20 ">

@unless (count($photos)== 0)

@foreach ($photos as $photo)
<x-photo-card :photo="$photo"/>
{{-- use :photo="$photo" to pass variables through the props --}}
@endforeach
    
@else
<p class="text-text1">
    No Photo Found
</p>
@endunless 
</div>
<div class="mt-6 p-4">
    {{$photos->links()}}
    {{-- pagination links  --}}
</div>
@endsection