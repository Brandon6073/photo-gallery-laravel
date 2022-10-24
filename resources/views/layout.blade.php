<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{asset('images/favicon.png')}}" />
    
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        color1: "#01092e",
                        color2: "#041e85",
                        color3: "#082dc2",
                        card: "#1b2657",
                        text1: "#d4d4d8"
                        
                    },
                },
            },
        };
    </script>
    <script src="//unpkg.com/alpinejs" defer></script>
    
    <title>Photo Gallery</title>
</head>
<body class="bg-color1">
    <nav class="flex text-text1 bg-color1 justify-between items-center border-b border-slate-500">
        <a href="{{route('index')}}" >
            <img class="w-20" src="{{asset('images/logo.png')}}" alt="" class="logo"/>
        </a>
        <ul class="flex space-x-6 mr-6 text-lg">
   
            @auth
  

            <li>
                <span class="font-bold uppercase">
                    welcome, {{auth()->user()->name}}
                </span> 
            </li>

            <li>
                <a
                href="{{route('photos.create')}}"
                class=" border border-slate-500 rounded-full text-text1 pr-4 pl-4 hover:bg-color3"
                >Post Photo</a>
            </li>
            <li>
                <a href="{{route('photos.manage')}}" class="hover:text-color3"
                    ><i class="fa-solid fa-gear"></i>
                    Manage Photos</a
                >
            </li>

            <li>
                <form class="inline" method="POST" action="/logout">
                @csrf
                <button type="submit" class="hover:text-color3">Logout
                </button>
            </form>
            </li>

            @else

            <li>
                <a href="{{route('users.create')}}" class="hover:text-color3"
                    ><i class="fa-solid fa-user-plus"></i> Register</a
                >
            </li>
            <li>
                <a href="{{route('users.login')}}"class="hover:text-color3"
                    ><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a
                >
            </li>
            @endauth
        </ul>
    </nav>

    <main>

    {{-- Content output here --}}
    @yield('content')

    </main>



    <footer class=" w-full flex items-center justify-start bg-color1 text-text1 h-24 md:justify-center mt-20 border-t border-slate-500">
    <p class="ml-2">Copyright &copy; 2022 - All Rights Reserved</p>


    </footer>

    <x-flash-message/>

</body>
</html>