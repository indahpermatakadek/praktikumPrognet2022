@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
        <div id="collection_card" class="relative flex flex-wrap justify-center items-center min-h-[100vh]">
            <div class="box">
                <img src="/img/collections/shoes1.png" alt="Sepatu" class="shoes">
            </div>
            <div class="box">
                <img src="/img/collections/shoes2.png" alt="Sepatu" class="shoes">
            </div>
            <div class="box">
                <img src="/img/collections/shoes3.png" alt="Sepatu" class="shoes">
            </div>
            <div class="box">
                <img src="/img/collections/shoes4.png" alt="Sepatu" class="shoes">
            </div>
            <div class="box">
                <img src="/img/collections/shoes5.png" alt="Sepatu" class="shoes">
            </div>
            <div class="box">
                <img src="/img/collections/shoes6.png" alt="Sepatu" class="shoes">
            </div>
            <div class="box">
                <img src="/img/collections/shoes7.png" alt="Sepatu" class="shoes">
            </div>
            <div class="box">
                <img src="/img/collections/shoes8.png" alt="Sepatu" class="shoes">
            </div>
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
        </div>
    </div>
@endsection