@extends('layouts.admin.amaster')

@section('title','Kategoriler')

@section('keywords','')

<!-- Content Header (Page header) -->
@section('content')

<section class="content-header">
    <h1>
        Mesaj Listesi

    </h1>



    <ol class="breadcrumb">
        <li><a href="{{url('/')}}/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li><a href="#">Mesajlar</a></li>

    </ol>
</section>
<div class="box">
    <div class="box-header with-border">

    </div>
    <!-- /.box-header -->
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif

    <div class="box-body">
        <table class="table table-bordered">
            <tbody><tr>
                <th>Id</th>
                <th>Adı Soyadı</th>
                <th>Email</th>
                <th >Konu</th>
                <th >Durum</th>
                <th >Oku</th>
                <th >Sil</th>
            </tr>

            @foreach($datas as $rs)
            <tr>
                <td>{{$rs->Id}}</td>
                <td>{{$rs->name}}</td>
                <td>{{$rs->email}}</td>
                <td>{{$rs->subject}}</td>
                <td>{{$rs->status}}</td>

                <td>
                    <a href="{{url('/')}}/admin/message/edit/{{$rs->Id}}" class="btn btn-block btn-primary btn-xs" > Oku/Detay</a>
                </td>
                <td >
                    <a href="{{url('/')}}/admin/message/del/{{$rs->Id}}" class="btn btn-block btn-danger btn-xs" onclick="return confirm('Silinecek Emin misin?')" > Sil</a>
                </td>
            </tr>
            @endforeach

            </tbody></table>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix">
        <ul class="pagination pagination-sm no-margin pull-right">
            <li><a href="#">«</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">»</a></li>
        </ul>
    </div>
</div>

@endsection