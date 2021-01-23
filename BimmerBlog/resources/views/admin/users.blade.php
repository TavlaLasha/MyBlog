@extends('layouts.dashboard')

@section('title', ' | Admin Panel')

<?php
    $c = 1;
    use App\Http\Controllers\AdminController;
?>

@section('content')
    <div class="card">
        <div class="card-header" style="font-size:20px;">
            {{ __('Users') }}
            <form action="/admin/users" method="get" class="input-group col-3" style="margin:auto 10px; float:right;">
                <input type="search" name="search" class="form-control" placeholder="Search" aria-label="Search"/>
                <button type="submit" class="btn btn-outline">
                    <i class="fas fa-search"></i>
                </button>
            </form>
        </div>
            <div class="card-body d-flex justify-content-around align-content-between flex-wrap">
                @if($users->count()>0)
                <table class="table table-responsive table-hover">
                    <thead>
                        <tr>
                            <td>N</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Email Verifried</td>
                            <td>Admin</td>
                            <td>Registered At</td>
                            <td>Updated At</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                @foreach($users as $user)
                    <tr>
                        <td><?=$c; $c++; ?></td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->email_verified_at}}</td>
                        <td>{{$user->admin}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                            <form action="deleteUser/{{$user->id}}" method="get" class="pull-right">
                                @csrf
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
                {{$users->links()}}
                @else
                    <p>No Content</p>
                @endif
            </div>
    </div>
@endsection