@extends('layouts.admin.amaster')

@section('title','Ürünler Listesi')

@section('keywords','')

<!-- Content Header (Page header) -->
@section('content')

<section class="content-header">
    <h1>
        Kitap Listesi

    </h1>



    <ol class="breadcrumb">
        <li><a href="{{url('/')}}/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li><a href="#">Ürünler</a></li>

    </ol>
</section>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><a href="{{url('/')}}/admin/kategori/ekle" class="btn  btn-success btn-sm">Kitap Ekle</a></h3>
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
                <th>Turu</th>
                <th>Kategorisi</th>
                <th >Fiyat</th>

                <th >Stok</th>
                <th >Durum</th>
                <th >Resim</th>
                <th >Düzenle</th>
                <th >Sil</th>
            </tr>

            @foreach($urunler as $urun)
            <tr>
                <td>{{$urun->Id}}</td>
                <td>{{$urun->adi}}</td>
                <td>{{$urun->turu}}</td>
                <td>{{$urun->kategori}}</td>
                <td>{{$urun->sfiyat}}</td>
                <td>{{$urun->stok}}</td>
                <td>{{$urun->durum}}</td>
                <td><img src="{{url('/')}}/userfiles/{{$urun->resim}}" height="30">

                    <a href="{{url('/')}}/admin/urun/galeri/{{$urun->Id}}"
                       onclick="return !window.open(this.href, '','top=100 left=200 width=800,height=600')">Galeri</a>

                </td>
                <td>
                    <a href="{{url('/')}}/admin/urun/edit/{{$urun->Id}}" class="btn btn-block btn-primary btn-xs" > Düzenle</a>
                </td>
                <td >
                    <a href="{{url('/')}}/admin/urun/del/{{$urun->Id}}" class="btn btn-block btn-danger btn-xs" onclick="return confirm('Silinecek Emin misin?')" > Sil</a>
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