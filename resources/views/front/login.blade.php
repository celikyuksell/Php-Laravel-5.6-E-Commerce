@extends('layouts.front.fmaster')

@section('title','User Login')

@section('keywords','User Login')

@section('description','User Login')



@section('content')
    <ul class="breadcrumb">
        <li><a href="{{url('/')}}">Anasayfa</a> <span class="divider">/</span></li>
        <li><a href="{{url('/login')}}">Login</a> <span class="divider">/</span></li>

    </ul>

    <div class="row">
        <div class="span4">
            <div class="well">
                <h5>LOGİN FORM</h5>
                @if (\Session::has('message'))
                    <div class="alert alert-error">
                        <p>{{ \Session::get('message') }}</p>
                    </div><br />
                @endif

                <form class="form-horizontal loginFrm" method="post" action="{{url('/')}}/login">
                    @csrf
                    <div class="control-group">
                        <input type="email" name="email"    placeholder="Email" required>
                    </div>
                    <div class="control-group">
                        <input type="password"   name="password" placeholder="Password" required>
                    </div>
                    <div class="control-group">
                        <label class="checkbox">
                            <input type="checkbox"> Remember me
                        </label>
                        <button type="submit" class="shopBtn btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection