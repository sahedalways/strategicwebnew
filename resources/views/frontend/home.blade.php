@extends('frontend.layouts.master')

@section('title', 'Strategic Web' . ' - Home')


@section('content')
    <div class="home-hero-sec">
        {{-- hero section contents here --}}
        @include('frontend.components._home_hero_content')
    </div>


    {{-- services here --}}
    @include('frontend.components._services')

    {{-- featured works here --}}
    @include('frontend.components._home_featured_work')


    {{-- featured plans here --}}
    @include('frontend.components._home_featured_plans')




@endsection
