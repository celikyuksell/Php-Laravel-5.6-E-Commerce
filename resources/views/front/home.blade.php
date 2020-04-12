@extends('layouts.front.fmaster')

@section('title',$data[0]->adi)

@section('keywords',$data[0]->keywords)

@section('description',$data[0]->description)

@section('sidebar')
    @include('front.fsidebar')
@endsection

@section('slider')
    @include('front.slider')
@endsection

@section('content')
    @include('front.content')
@endsection