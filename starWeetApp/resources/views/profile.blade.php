@extends('layouts.main')
@section('title', '{{$user->username}}')
@section('home')
<div>
    <span>id: {{$user->id}}</span>
    <span>Nome: {{$user->username}}</span>
    <span>Email {{$user->email}}</span>
</div>  
@endsection
