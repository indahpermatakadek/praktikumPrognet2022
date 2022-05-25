@extends('users.layout')

@section('content')
<main id="content" role="main" class="cart-page">

    <div class="container">
        <div class="mb-4 mt-4">
            <h1 class="text-center">Cart</h1>
        </div>
        @livewire('cart-list-livewire')
    </div>
</main>
@endsection