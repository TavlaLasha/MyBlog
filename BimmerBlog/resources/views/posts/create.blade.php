<?php 
    use App\Http\Controllers\PostsController;
?>
@extends('layouts.app')

@section('title', 'Create')

@section('content')
    <h1>Create Post</h1>
    <form action="{{url()->action([PostsController::class, 'store'])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', '', ['class' => 'form-control', 'placeholder' => 'Body'])}}
        </div>
        <div class="form-group">
            {{-- {{Form::label('cover_image', 'Upload:')}} --}}
            {{Form::file('cover_image')}}
        </div>
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
@endsection