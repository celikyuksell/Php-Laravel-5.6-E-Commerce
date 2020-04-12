@extends('layouts.front.fmaster')

@section('title',$data[0]->adi)

@section('keywords',$data[0]->keywords)

@section('description',$data[0]->description)

@section('sidebar')
    @include('front.fsidebar')
@endsection

@section('slider')

@endsection

@section('content')


    <hr class="soften">
    <div>
        <h1>İLETİŞİM</h1>
    </div>
    <hr class="soften">
    <div class="row">
        <div class="span8">

            {!! $data[0]->iletisim !!}
        </div>

    </div>



@endsection