@extends('layouts.header')
    
@section('content')
    <section class=" border-2 border-green-500 w-full h-lvh grid grid-flow-row grid-cols-3 gap-2  ">
        <div class="border-2 border-green-500 p-3">
            <nav class="flex flex-col">
                <a href="/home">HOME</a>
                <a href="/user/{{$user->username}}">Profile</a>
            </nav>
        </div>
        <div class="border-2 border-blue-500 p-3">
            feed sec
            @yield('home')
        </div>
        <div class="border-2 border-yellow-500 p-3">
            extra bar
        </div>
    </section>
@endsection