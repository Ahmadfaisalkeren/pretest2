@extends('template.index')

@section('title', 'Dashboard')

@section('content')
    <h1 class="text-center">Selamat Datang, {{ auth()->user()->name }}</h1>
@endsection
