@props(['tagsCsv'])
{{-- coma seperated value tag  --}}

@php
    $tags = explode(',', $tagsCsv);
    // turn the coma seperated value into an array and put it into this variable 
@endphp
<ul class="flex p-4 justify-center ">
    @foreach ($tags as $tag)
        
    <li
        class="flex items-center justify-center bg-color1 text-text1 rounded-xl py-1 px-3 mr-2 text-xs"
    >
        <a href="/?tag={{$tag}}">{{$tag}}</a>
    </li>
    @endforeach

</ul>