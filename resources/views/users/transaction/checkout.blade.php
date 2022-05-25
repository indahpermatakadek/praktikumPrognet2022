@extends('users.layout')

@section('content')
<div class="container">
    <div class="mb-5">
        <h1 class="text-center">Checkout</h1>
    </div>

    @livewire('checkout-livewire')
</div>
@endsection