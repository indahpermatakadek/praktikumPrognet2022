@extends('dashboard.user.layouthomepage')

@section('css')
    <link rel="stylesheet" href="/css/collections.css">
@endsection

@section('content')
<div class="w-full">
    <div class="relative w-full flex justify-between items-center mt-10">

        <div class="relative max-w-full sm:max-w-[300px] lg:max-w-[600px]">

            <h2 class="text-[#333] text-[3em] md:text-[2em] lg:text-[4em] leading-[1.4em] font-medium">It's not just Shoes <br>
                It's <span class="text-[#951b5c] text-[1.2em] font-black">Pair of Shoes</span>
            </h2>

            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                Voluptas odit quam ipsa laboriosam a! Provident alias laudantium dignissimos officiis aperiam suscipit dicta. 
                Voluptas, sapiente numquam sunt voluptatum optio veritatis odio!
            </p>

            <a href="Ooyeah?likeyouhadenoughbraincellstolearnmore" class="inline-block rounded-full shadow-lg shadow-[#951b5c]/50 my-2 bg-[#951b5c] py-2 px-5 font-semibold text-white hover:underline hover:decoration-2">Learn More</a>

        </div>

        <div class="w-[350px] flex justify-end hidden sm:block">
            <img src="/img/shoes.png" alt="a Pair of Shoes">
        </div>
        
    </div>

    <div id="collections" class="relative items-center w-full min-h-[100vh] mt-28">
        <div class="relative w-full">
            <h2 class="text-center text-[2em] md:text-[3em] font-bold p-5 m-5">
                <span class="before:block before:absolute py-3 px-2 before:-inset-1 before:-skew-y-3 before:bg-white md:before:bg-[#951b5c] relative inline-block">
                    <span class="relative text-[#951b5c] md:text-white">BEST</span>
                </span>
                COLLECTIONS
            </h2>
            <h2 class="text-[1.5em] text-center w-full font-semibold">
                Some 
                <span class="font-bold text-white md:text-slate-300 lg:text-[#951b5c]">
                    Pair of Shoes 
                </span>
                Collection for You!
            </h2>
        </div>

        <div id="collection_card" class="relative flex flex-wrap justify-center items-center min-h-[100vh]">
            <div class="box">
                <h2 class="name">For You</h2>
                <a href="/user/home" class="buy">Buy Now</a>
                <img src="/img/collections/shoes1.png" alt="Sepatu" class="shoes">
            </div>
            <div class="box">
                <h2 class="name">For You</h2>
                <a href="/user/home" class="buy">Buy Now</a>
                <img src="/img/collections/shoes2.png" alt="Sepatu" class="shoes">
            </div>
            <div class="box">
                <h2 class="name">For You</h2>
                <a href="/user/home" class="buy">Buy Now</a>
                <img src="/img/collections/shoes3.png" alt="Sepatu" class="shoes">
            </div>
            <div class="box">
                <h2 class="name">For You</h2>
                <a href="/user/home" class="buy">Buy Now</a>
                <img src="/img/collections/shoes4.png" alt="Sepatu" class="shoes">
            </div>
            <div class="box">
                <h2 class="name">For You</h2>
                <a href="/user/home" class="buy">Buy Now</a>
                <img src="/img/collections/shoes5.png" alt="Sepatu" class="shoes">
            </div>
            <div class="box">
                <h2 class="name">For You</h2>
                <a href="/user/home" class="buy">Buy Now</a>
                <img src="/img/collections/shoes6.png" alt="Sepatu" class="shoes">
            </div>
            <div class="box">
                <h2 class="name">For You</h2>
                <a href="/user/home" class="buy">Buy Now</a>
                <img src="/img/collections/shoes7.png" alt="Sepatu" class="shoes">
            </div>
            <div class="box">
                <h2 class="name">For You</h2>
                <a href="/user/home" class="buy">Buy Now</a>
                <img src="/img/collections/shoes8.png" alt="Sepatu" class="shoes">
            </div>
        </div>
    </div>

    <div id="about" class="relative items-center w-full min-h-[100vh] mt-28">
        <div class="relative w-full">
            <h2 class="text-center text-[2em] md:text-[3em] font-bold p-5 m-5">
                <span class="before:block before:absolute py-3 px-2 before:-inset-1 before:-skew-y-3 before:bg-white md:before:bg-[#951b5c] relative inline-block">
                    <span class="relative text-[#951b5c] md:text-white">ABOUT</span>
                </span>
                US
            </h2>
        </div>
    </div>
</div>

<script src="/js/vanilla-tilt.min.js"></script>
<script>
    VanillaTilt.init(document.querySelectorAll(".box"), {
        max: 25,
        speed: 400
    });
</script>
@endsection