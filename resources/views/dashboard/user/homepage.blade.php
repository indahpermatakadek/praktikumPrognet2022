@extends('dashboard.user.layouthomepage')

@section('content')
<div class="relative w-full flex justify-between items-center">

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
@endsection