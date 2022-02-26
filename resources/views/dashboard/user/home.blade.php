@extends('dashboard.user.layoutdashboard')

@section('content')
    <div class="rounded shadow-xl p-5 w-[80%] mx-auto divide-y-2 divide-emerald-900 bg-cyan-500 shadow-cyan-500/50">
        <h1 class="my-2 font-bold">DASHBOARD</h1>
        {{-- <hr class="my-4 border-bold"> --}}
        <h2 class="p-3">Welcome to User Dashboard {{ auth()->user()->name }}</h2>
    </div>
@endsection