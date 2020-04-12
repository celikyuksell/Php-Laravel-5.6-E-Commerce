@extends('layouts.admin.amaster')

@section('title','Sayfa başlığı')

@section('keywords','')

<!-- Content Header (Page header) -->
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
         Siparişler:  {{$durum }} Listesi

    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Siparişler</a></li>

    </ol>


</section>
<!-- Content İçeriği Buraya Gelecek -->

<div class="box">
    <div class="box-body">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br />
        @endif

        <table class="table table-bordered">
            <tbody><tr>
                <th>Id</th>
                <th>Üye Adsoy</th>
                <th>Adsoy</th>
                <th >Tarih</th>
                <th >Adres</th>
                <th >Şehir</th>
                <th >Telefon</th>
                <th >Tutar</th>
                <th >Durum</th>
                <th >Detay</th>
            </tr>

            @foreach($siparis as $rs)
                <tr>
                    <td>{{$rs->Id}}</td>
                    <td><a href="{{url('/')}}/uye_detay/{{$rs->Id}}"> {{$rs->uyeadsoy}}</a> </td>

                    <td>{{$rs->adsoy}}</td>

                    <td>{{$rs->created_at}}</td>
                    <td>{{$rs->adres}}</td>
                    <td>{{$rs->sehir}}</td>
                    <td>{{$rs->tel}}</td>
                    <td>{{$rs->tutar}} TL</td>
                    <td>  {{$rs->durum }} </td>


                    <td >
                        <a href="{{url('/')}}/admin/siparis_detay/{{$rs->Id}}" class="btn btn-block btn-danger btn-xs" ) > Detay</a>
                    </td>
                </tr>

            @endforeach

            </tbody></table>




    </div>

</div>

@endsection
    