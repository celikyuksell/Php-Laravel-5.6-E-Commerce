@extends('layouts.admin.amaster')

@section('title','Sipariş Detay')

@section('keywords','')

<!-- Content Header (Page header) -->
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Sipariş Detay

    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Sipariş</a></li>

    </ol>
</section>
<!-- Content İçeriği Buraya Gelecek -->

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

    <form method="post" action="{{url('/')}}/admin/siparis_update/{{$siparis[0]->Id}}">

        <table class="table table-bordered" class="span6">
            <tbody>
            <tr>
                <th>Sipariş Id</th>
                <td>{{$siparis[0]->Id}}</td>
            </tr>
            <tr>
                <th>Adı Soyadı</th>
                <td>{{$siparis[0]->adsoy}}</td>
            </tr>
            <tr>
                <th>Adres</th>
                <td>{{$siparis[0]->adres}}</td>
            </tr>
            <tr>
                <th>Şehir</th>
                <td>{{$siparis[0]->sehir}}</td>
            </tr>
            <tr>
                <th>Telefon</th>
                <td>{{$siparis[0]->tel}}</td>
            </tr>
            <tr>
                <th>Durum</th>
                <td>
                    <select class="form-control" name="durum">
                        <option selected>{{$siparis[0]->durum}}</option>
                        <option>Onaylandi</option>
                        <option>Kargoda</option>
                        <option>Tamamlandi</option>
                        <option>İptal</option>

                    </select>

                </td>
            </tr>
            <tr>
                <th>Açiklama</th>
                <td> <textarea name="aciklama" class="form-control" rows="3" cols="80">{{$siparis[0]->aciklama}}</textarea>      </td>
            </tr>
            </tbody>
        </table>
        @csrf
        <input type="submit" class="btn  btn-success btn-sm" value="GÜNCELLE">
    </form>

        <table class="table table-bordered">
            <tbody><tr>
                <th>Id</th>
                <th>Adı</th>
                <th>Miktar</th>
                <th >Fiyat</th>

                <th >Tutar</th>
                <th >Resim</th>
                <th >İşlemler..</th>
            </tr>
            <?php $top=0; ?>
            @foreach($urunler as $urun)
                <tr>
                    <td>{{$urun->Id}}</td>
                    <td>{{$urun->adi}}</td>

                    <td>{{$urun->fiyat}} TL</td>
                    <td>{{$urun->miktar}}</td>
                    <td>  {{$urun->tutar}}  </td>
                    <td>

                        <a href="{{url('/')}}/urun/{{$urun->Id}}">
                            <img src="{{url('/')}}/userfiles/{{$urun->resim}}" height="40">
                        </a>

                    </td>

                    <td >
                        @if ($siparis[0]->durum=='Yeni')
                            <a href="{{url('/')}}/urun_iptal/{{$urun->Id}}" class="btn btn-block btn-danger btn-xs" onclick="return confirm('İade Edilecek Emin misin?')" > İPTAL</a>
                        @endif
                    </td>
                </tr>
                <?php $top=$top+$urun->tutar; ?>
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
    