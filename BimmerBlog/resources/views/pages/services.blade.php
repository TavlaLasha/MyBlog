@extends('layouts.app')

@section('title', $title)

@section('content')
    <h1>Services</h1>
    @if(count($services) > 0)
        <ul>
            @foreach($services as $service)
                <li>{{$service}}</li>
            @endforeach
        </ul>
    @endif
@endsection