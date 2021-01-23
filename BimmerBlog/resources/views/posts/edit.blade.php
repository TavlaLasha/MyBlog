<?php 
    use App\Http\Controllers\PostsController;
?>
@extends('layouts.app')

@section('content')
    <h1>Edit Post</h1>
    <form action="{{url()->action([PostsController::class, 'update'], $post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $post->body, ['class' => 'form-control', 'placeholder' => 'Body'])}}
        </div>
        <div class="form-group">
            {{-- {{Form::label('cover_image', 'Upload:')}} --}}
            {{Form::file('cover_image')}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        <input type="submit" value="Submit" class="btn btn-primary">
    </form>
@endsection