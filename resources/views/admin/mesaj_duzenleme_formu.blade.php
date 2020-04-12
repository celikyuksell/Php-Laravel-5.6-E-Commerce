@extends('layouts.admin.amaster')

@section('title','Mesaj Düzenleme Sayfası')

@section('keywords','')

<!-- Content Header (Page header) -->
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Mesaj Detay Sayfası

    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/')}}/admin"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('/')}}/admin/kategoriler">Kategori Listesi</a></li>
        <li><a href="#">Mesaj Düzenleme</a></li>

    </ol>
</section>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Mesaj Düzenleme Formu</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->

    <form class="form-horizontal" action="{{url('/')}}/admin/message/edit/{{ $veri[0]->Id }}" method="post"  >
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label  class="col-sm-2 control-label">Adı Soyadı</label>

                <div class="col-sm-10">
                     {{ $veri[0]->name }}
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                     {{ $veri[0]->email }}
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">Konu</label>

                <div class="col-sm-10">
                     {{ $veri[0]->subject }}
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">Ip</label>

                <div class="col-sm-10">
                     {{ $veri[0]->ip }}
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Tarihler</label>

                <div class="col-sm-10">
                    Gönderilme:{{ $veri[0]->created_at }}<br>
                    Güncelleme: {{ $veri[0]->updated_at }}
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">Durumu</label>

                <div class="col-sm-10">
                    {{ $veri[0]->status }}

                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Konu</label>

                <div class="col-sm-10">
                    {{ $veri[0]->subject }}
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">Mesaj</label>

                <div class="col-sm-10">
                    {{ $veri[0]->message }}
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">İşlem Notu</label>

                <div class="col-sm-8">
                    <textarea name="note" class="form-control" rows="5" >{{ $veri[0]->note }}</textarea>
                </div>
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



@endsection