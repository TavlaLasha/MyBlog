<?php 
    use App\Http\Controllers\PostsController;
?>
@extends('layouts.app')

@section('content')
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    <hr>
    <small>Written on {{$post->created_at}} Views: {{$post->views}}</small>
    @if(!str_contains($post->cover_image, 'noimage'))
    <div class="row">
        <div class="col-md-12">
            <img style="width:70%;" src="/storage/cover_images/{{$post->cover_image}}" alt="NO_IMAGE">
        </div>
    </div>
    @endif

    <p><?=html_entity_decode($post->body);?></p>
    @if(Auth::check())
        @if(Auth::user()->admin)
        <hr>
        <div class="d-flex justify-content-between col-2">
            <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>
            
            <form action="{{url()->action([PostsController::class, 'destroy'], $post->id)}}" method="post" class="pull-right">
                @csrf
                {{Form::hidden('_method', 'DELETE')}}
                
                <input type="button" value="Delete" class="btn btn-danger" data-toggle="modal" data-target="#ModalView">
                
                <div class="modal fade" id="ModalView" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    @include('inc.modal')
                </div>
            </form>
        </div>
        @endif
    @endif
@endsection