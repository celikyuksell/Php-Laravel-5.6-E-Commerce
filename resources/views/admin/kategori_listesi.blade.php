@extends('layouts.admin.amaster')

@section('title','Kategoriler')

@section('keywords','')

<!-- Content Header (Page header) -->
@section('content')

<section class="content-header">
    <h1>
        Kategori Listesi

    </h1>



    <ol class="breadcrumb">
        <li><a href="{{url('/')}}/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li><a href="#">Kategoriler</a></li>

    </ol>
</section>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><a href="{{url('/')}}/admin/kategori/ekle" class="btn  btn-success btn-sm">Kategori Ekle</a></h3>
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
                <th>Adı</th>
                <th>Ust Kategori</th>
                <th >Durum</th>
                <th >Resim</th>
                <th >Düzenle</th>
                <th >Sil</th>
            </tr>

            @foreach($datas as $rs)
            <tr>
                <td>{{$rs->Id}}</td>
                <td>{{$rs->adi}}</td>
                <td>{{$rs->ust_id}}</td>

                <td>{{$rs->durum}}</td>
                <td><img src="{{url('/')}}/userfiles/{{$rs->resim}}" height="30"></td>
                <td>
                    <a href="{{url('/')}}/admin/kategori/edit/{{$rs->Id}}" class="btn btn-block btn-primary btn-xs" > Düzenle</a>
                </td>
                <td >
                    <a href="{{url('/')}}/admin/kategori/del/{{$rs->Id}}" class="btn btn-block btn-danger btn-xs" onclick="return confirm('Silinecek Emin misin?')" > Sil</a>
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