<?php 
    use App\Http\Controllers\PostsController;
?>

@extends('layouts.dashboard')

@section('title', ' | Admin Panel')

@section('content')
    <div class="card">
        <div class="card-header" style="font-size:20px;">
            {{ __('Posts') }}
            <form action="/admin/posts" method="get" class="input-group col-3" style="margin:auto 10px; float:right;">
                <input type="search" name="search" class="form-control" placeholder="Search" aria-label="Search"/>
                <button type="submit" class="btn btn-outline">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <div style="float:right;">
                <a href="/posts/create" class="btn btn-secondary" style="padding: 6px 7px;">Add Post</a>
            </div>
        </div>
            <div class="card-body d-flex justify-content-around align-content-between flex-wrap">
                <?php $c=1; ?>
                @if($posts->count()>0)
                <table class="table table-responsive table-hover" style="text-align:center;">
                    <thead>
                        <tr>
                            <td>N</td>
                            <td></td>
                            <td>Title</td>
                            <td>Views</td>
                            <td>Added</td>
                            <td>Updated</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td><?=$c; $c++; ?></td>
                            <td><img style="width:80%;" src="/storage/cover_images/{{$post->cover_image}}" alt="NO_IMAGE"></td>
                            <td><h4><a href="/posts/{{$post->id}}">{{$post->title}}</a></h4></td>
                            <td>{{$post->views}}</td>
                            <td>{{$post->created_at}}</td>
                            <td>{{$post->updated_at}}</td>
                            <td>
                                <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary">Edit</a>
                            </td>
                            <td>
                                <form name="{{$c}}" action="{{url()->action([PostsController::class, 'destroy'], $post->id)}}" method="post" class="pull-right">
                                    @csrf
                                    {{Form::hidden('_method', 'DELETE')}}
                                    
                                    <input type="button" value="Delete" class="btn btn-danger" data-toggle="modal" data-target="#Modal{{$c}}">
                                    
                                    <div class="modal fade" id="Modal{{$c}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        @include('inc.modal')
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$posts->links()}}
                @else
                    <p>No Posts Found</p>
                @endif
            </div>
    </div>
@endsection