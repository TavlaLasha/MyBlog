@extends('layouts.app')

@section('content')
    <h1>Posts</h1>
    <div class="card">
        <ul class="list-group list-group-flush">
        @if($posts->count()>0)
        @foreach($posts as $post)
        <a href="/posts/{{$post->id}}">
        <li class="list-group-item">
            <div class="row">
                <div class="col-md-4">
                    <img style="width:100%;" src="/storage/cover_images/{{$post->cover_image}}" alt="NO_IMAGE">
                </div>
                <div class="col-md-8 py-4">
                    <h3>{{$post->title}}</h3>
                    <small>Written on {{$post->created_at}} Views: {{$post->views}}</small>
                </div>
            </div>
        </li>
        </a>
        @endforeach
        {{$posts->links()}}
        @else
            <h5 style="padding:20px; text-align:center;">No Posts Found</h5>
        @endif
        </ul>
    </div>
@endsection