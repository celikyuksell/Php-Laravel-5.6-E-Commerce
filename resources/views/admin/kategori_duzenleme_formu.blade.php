@extends('layouts.admin.amaster')

@section('title','Kategori Düzenleme Sayfası')

@section('keywords','')

<!-- Content Header (Page header) -->
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Kategori Ekleme

    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/')}}/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('/')}}/admin/kategoriler">Kategori Listesi</a></li>
        <li><a href="#">Kategori Düzenleme</a></li>

    </ol>
</section>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Kategori Düzenleme Formu</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->

    <form class="form-horizontal" action="{{url('/')}}/admin/kategori/update/{{ $veri[0]->Id }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label  class="col-sm-2 control-label">Kategori Adı</label>

                <div class="col-sm-10">
                    <input type="text" name="adi" value="{{ $veri[0]->adi }}" class="form-control"  placeholder="Kategori adı">
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
                <label  class="col-sm-2 control-label">Kategorisi</label>
                <div class="col-sm-10">
                    <select class="form-control" name="ust_id">
                        <option selected  value="{{$veri[0]->ust_id}}" >{{ $veri[0]->kategori }}</option>
                        <option value="0">Kategori Yok</option>
                        @foreach($kategori as $rs)
                            <option value="{{$rs->Id}}">{{$rs->adi}}</option>
                        @endforeach
                    </select>
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
                <label class="col-sm-2 control-label">Kategori Ana resim</label>
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