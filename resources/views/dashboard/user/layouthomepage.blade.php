<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- <link rel="stylesheet" href="css/style.css"> --}}
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #circle {
            clip-path: circle(600px at right 800px);
        }

        @yield('css');
    </style>

    <title>Praktikum Pemrograman Internet 2022</title>
</head>
<body>
    <section class="relative w-full min-h-screen py-[100px] px-[50px] md:p-[100px] flex justify-between items-center bg-[#f7f7f7] ">

        <div id="circle" class="absolute sm:top-0 bottom-0 sm:left-0 right-0 w-full h-[60%] sm:h-full bg-[#951b5c]"></div>

        <header class="absolute top-0 left-0 w-full py-[40px] px-[10px] sm:px-[50px] md:px-[100px] flex justify-between items-center">

            <a href="{{ route('user.homepage') }}" class="relative max-w-full hidden sm:block">
                <img src="/img/logo.jpeg" alt="Logo" class="w-16 rounded-full">
            </a>

            <ul class="relative flex">
                <li class="list-none flex-3 mr-2">
                    <a href="{{ route('user.homepage') }}" class="inline-block text-[#333] font-normal ml-[40px] no-underline text-center hover:text-[#951b5c]">
                        Home
                    </a>
                </li>
                <li class="list-none flex-3 mr-2">
                    <a href="{{ route('user.collections') }}" class="inline-block text-[#333] font-normal ml-[40px] no-underline text-center hover:text-[#951b5c]">
                        Collections
                    </a>
                </li>
                <li class="list-none flex-3 mr-2">
                    <a href="{{ route('user.about') }}" class="inline-block text-[#333] font-normal ml-[40px] no-underline text-center hover:text-[#951b5c]">
                        About Us
                    </a>
                </li>
                @auth
                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <li class="list-none flex-3">
                        <button type="submit" class="inline-block text-[#333] font-normal ml-[40px] no-underline text-center hover:text-[#951b5c]">    
                            Logout
                        </button>
                    </li>
                </form>
                @else
                <li class="list-none flex-3">
                    <a href="{{ route('user.login') }}" class="inline-block text-[#333] font-normal ml-[40px] no-underline text-center hover:text-[#951b5c]">
                        Login
                    </a>
                </li>
                @endauth
            </ul>

        </header>

        @yield('content')

    </section>
</body>
</html>