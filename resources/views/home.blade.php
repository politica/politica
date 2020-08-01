@extends('layouts.app')

@section('title', 'Online Politics and Philosophy Tests')

@section('content')
    @include('home.header')

    <div class="relative">
        @include('home.stats')

        @include('home.about')

        @include('home.tests')

        @include('home.reviews')
    </div>
@endsection
