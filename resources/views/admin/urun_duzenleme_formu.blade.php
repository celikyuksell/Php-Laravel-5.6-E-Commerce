@extends('layouts.admin.amaster')

@section('title','Ürün Düzenleme Sayfası')

@section('keywords','')

<!-- Content Header (Page header) -->
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Ürün Ekleme

    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/')}}/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('/')}}/admin/urunler">Ürün Listesi</a></li>
        <li><a href="#">Ürün Düzenleme</a></li>

    </ol>
</section>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Ürün Düzenleme Formu</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->

    <form class="form-horizontal" action="{{url('/')}}/admin/urun/update/{{ $veri[0]->Id }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label  class="col-sm-2 control-label">Ürün Adı</label>

                <div class="col-sm-10">
                    <input type="text" name="adi" value="{{ $veri[0]->adi }}" class="form-control"  placeholder="Ürün adı">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Keywords-Anahtar Kelimeler</label>

                <div class="col-sm-10">
                    <input type="text" name="keywords"  value="{{ $veri[0]->keywords }}" class="form-control"  placeholder="Keywords">
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">Description-Açıklama</label>

                <div class="col-sm-10">
                    <input type="text" name="description" value="{{ $veri[0]->description }}"  class="form-control"  placeholder="Description">
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">Ürün Türü</label>
                <div class="col-sm-10">
                <select class="form-control" name="turu_id">
                    <option selected  value="{{$veri[0]->turu_id}}" >{{ $veri[0]->turu }}</option>

                @foreach($turler as $rs)
                    <option value="{{$rs->Id}}">{{$rs->adi}}</option>
                    @endforeach
                </select>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Kategorisi</label>
                <div class="col-sm-10">
                    <select class="form-control" name="kategori_id">
                        <option selected  value="{{$veri[0]->kategori_id}}" >{{ $veri[0]->kategori }}</option>
                        @foreach($kategori as $rs)
                            <option value="{{$rs->Id}}">{{$rs->adi}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Yazarı</label>

                <div class="col-sm-10">
                    <input type="text" name="yazar" value="{{ $veri[0]->yazar }}" class="form-control"  placeholder="Yazarı">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Stok Miktarı</label>

                <div class="col-sm-10">
                    <input type="text" name="stok"   value="{{ $veri[0]->stok }}"  class="form-control"  placeholder="Stok">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Alış Fiyatı</label>

                <div class="col-sm-10">
                    <input type="text" name="afiyat"  value="{{ $veri[0]->afiyat }}"  class="form-control"  placeholder="Alış Fiyatı">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Satış Fiyatı</label>

                <div class="col-sm-10">
                    <input type="text" name="sfiyat"   value="{{ $veri[0]->sfiyat }}"  class="form-control"  placeholder="Satış Fiyatı">
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">Ürün Açıklama</label>

                <div class="col-sm-10">
                    <textarea name="aciklama" id="aciklama" class="form-control" rows="10" cols="80">

                        {{ $veri[0]->aciklama }}
                    </textarea>

                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Aktif Durum</label>

                <div class="col-sm-10">
                    <select class="form-control" name="durum">
                        <option selected>{{ $veri[0]->durum }}</option>
                        <option>Evet</option>
                        <option>Hayır</option>

                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Ürün Ana resim</label>
                <div class="col-sm-10">
                    <input type="hidden" name="resim2" value="{{ $veri[0]->resim }}">
                    <input type="file"  name="resim">
                </div>
                <img src="{{url('/')}}/userfiles/{{ $veri[0]->resim }}" height="100">
                <p class="help-block">Resim dosyası seçiniz.</p>
            </div>


        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-default">Cancel</button>
            <button type="submit" class="btn btn-info pull-right">GUNCELLE</button>
        </div>
        <!-- /.box-footer -->
    </form>

</div>


@endsection

@section("java")

    <script src="{{url('/')}}/assets/admin/bower_components/ckeditor/ckeditor.js"></script>

    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('aciklama')
            //bootstrap WYSIHTML5 - text editor
            //$('.textarea').wysihtml5()
        })
    </script>

@endsection