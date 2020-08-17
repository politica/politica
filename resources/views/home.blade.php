@extends('layouts.app')

@section('title', 'Online Politics and Philosophy Tests')

@section('content')
    <div class="px-4 sm:px-6 lg:px-8 space-y-20 md:space-y-40">
        @include('home.header')

        @include('home.about')

        @include('home.stats')

        @include('home.reviews')
    </div>
@endsection
