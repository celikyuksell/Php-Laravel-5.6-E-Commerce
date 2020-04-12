@extends('layouts.front.fmaster')

@section('title','User Panel')

@section('keywords','User Panel')

@section('description','User Panel')

@section('sidebar')
    @include('front.usersidebar')
@endsection

@section('content')
    <ul class="breadcrumb">
        <li><a href="{{url('/')}}">Anasayfa</a> <span class="divider">/</span></li>
        <li><a href="{{url('/user')}}">User</a> <span class="divider">/</span></li>

    </ul>

    <div class="row">
        <div class="span4">
            <div class="well">
                <h5>User Panel</h5>
                 User Dashboard

            </div>
        </div>
    </div>


@endsection