
@props(['photo'])
{{-- other way to seperate the componenets  --}}
<x-card>
    <div class="flex md:block ">

        <h4>
            <a href="{{route('photos.show',['photo'=>$photo->id])}}"">
                <img
                class="hidden w-50 md:block  hover:rotate-6 "
                src="{{$photo->photo? asset('storage/'. $photo->photo): asset('images/no-image.png')}}" 
                alt="image"
            />
            </a>
        </h4>
        <div class="text-text1 text-center p-2"> 
            <h4>
                <a href="{{route('photos.show',['photo'=>$photo->id])}}">{{$photo->title}}</a>
            </h4>
            <x-photo-tags :tagsCsv='$photo->tags' />
                {{-- tagsCsv as props --}}
        </div>
    </div>
</x-card>