<div>
    <form action="/">
        <div class="relative border-2 border-text1 m-4 rounded-lg mx-80 " >
            <div class="absolute top-4 left-3">
                <i
                    class="fa fa-search text-text1 hover:text-text1"
                ></i>
            </div>
            <input
                type="text"
                name="search"
                class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none text-white bg-color2"
                placeholder="Search for photos..."
            />
            {{-- name="search" will apear in url  --}}
            <div class="absolute top-2 right-2">
                <button
                    type="submit"
                    class="h-10 w-20 text-white rounded-lg bg-color1 hover:bg-color3 "
                >
                    Search
                </button>
            </div>
        </div>
    </form>
</div>
