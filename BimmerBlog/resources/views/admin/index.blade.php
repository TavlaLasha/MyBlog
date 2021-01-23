@extends('layouts.dashboard')

@section('title', ' | Admin Panel')

@section('content')
    <div class="card">
        <div class="card-header" style="font-size:20px;">{{ __('Dashboard') }}</div>

        <div class="card-body d-flex justify-content-around align-content-between flex-wrap">
            <div class="card dashCard">
                <div class="card-header">{{ __('Views') }} </div>

                <div class="card-body" style='font-size:24px'>
                    {{$viewsCount}}
                    <i class="fa fa-eye"></i>
                </div>
            </div>
            <div class="card dashCard">
                <div class="card-header">{{ __('Users') }}</div>

                <div class="card-body" style='font-size:24px'>
                    {{$usersCount}}
                    <i class='fas fa-user-friends'></i>
                </div>
            </div>
            <div class="card dashCard">
                <div class="card-header">{{ __('Posts') }}</div>

                <div class="card-body" style='font-size:24px'>
                    {{$postsCount}}
                    <i class='fas fa-rss-square'></i>
                </div>
            </div>
            {{-- <div class="card dashCard">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-header">{{ __('Views') }}</div>

                <div class="card-body">
                    

                </div>
            </div>
            <div class="card dashCard">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-header">{{ __('Views') }}</div>

                <div class="card-body">
                    

                </div>
            </div> --}}
        </div>
    </div>
@endsection