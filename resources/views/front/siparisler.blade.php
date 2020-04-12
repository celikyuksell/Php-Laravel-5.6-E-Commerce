@extends('layouts.front.fmaster')

@section('title','Sepetim')

@section('keywords','')

@section('description','')

@section('sidebar')
    @include('front.usersidebar')
@endsection

@section('slider')

@endsection

@section('content')


    <hr class="soften">
    <div>
        <h1>YAPTIĞINIZ SİPARİŞLER</h1>
    </div>
    <hr class="soften">
    <div class="row">
        <div class="span8">
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif

            <table class="table table-bordered">
                <tbody><tr>
                    <th>Id</th>
                    <th>Adsoy</th>
                    <th >Tarih</th>

                    <th >Tutar</th>
                    <th >Durum</th>
                    <th >Detay</th>
                </tr>

                @foreach($data2 as $rs)
                    <tr>
                        <td>{{$rs->Id}}</td>
                        <td>{{$rs->adsoy}}</td>

                        <td>{{$rs->created_at}}</td>
                        <td>{{$rs->tutar}} TL</td>
                        <td>  {{$rs->durum }} </td>


                        <td >
                            <a href="{{url('/')}}/siparis_detay/{{$rs->Id}}" class="btn btn-block btn-danger btn-xs" )" > Detay</a>
                        </td>
                    </tr>

                @endforeach

                </tbody></table>




        </div>

    </div>



@endsection