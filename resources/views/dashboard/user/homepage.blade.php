@extends('dashboard.user.layouthomepage')

@section('content')
<div class="relative w-full flex justify-between items-center">

    <div class="relative max-w-[300px] lg:max-w-[600px]">

        <h2 class="text-[#333] text-[2em] lg:text-[4em] leading-[1.4em] font-medium">It's not just Shoes <br>
            It's <span class="text-[#951b5c] text-[1.2em] font-black">Pair of Shoes</span>
        </h2>

        <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
            Voluptas odit quam ipsa laboriosam a! Provident alias laudantium dignissimos officiis aperiam suscipit dicta. 
            Voluptas, sapiente numquam sunt voluptatum optio veritatis odio!
        </p>

        <a href="Ooyeah?likeyouhadenoughbraincellstolearnmore" class="underline hover:text-sky-500">Learn More</a>

    </div>

    <div class="w-[350px] flex justify-end">
        <img src="/img/shoes.png" alt="a Pair of Shoes">
    </div>
    
</div>
@endsection