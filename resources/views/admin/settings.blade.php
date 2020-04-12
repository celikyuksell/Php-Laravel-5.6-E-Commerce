@extends('layouts.admin.amaster')

@section('title','Site Ayarları')



<!-- Content Header (Page header) -->
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Site Ayarları

    </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Ayarlar</a></li>

    </ol>
</section>
<!-- Content İçeriği Buraya Gelecek -->
<div class="row">
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <div class="col-md-12">
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="false">Genel Bilgiler</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">SMTP Settings</a></li>
                <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="true">Hakkımızda Sayfası</a></li>
                <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="true">İletişim Sayfası</a></li>

            </ul>
            <form METHOD="post" action="{{url('/')}}/admin/settingsupdate/{{$data[0]->Id}}">
                @csrf
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <b>Site Genel Bilgiler</b>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Site Title</label>
                        <div class="col-sm-10"> <input type="text" value="{{$data[0]->adi}}" class="form-control" name="adi" > </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Keywords</label>
                        <div class="col-sm-10"> <input type="text" value="{{$data[0]->keywords}}" class="form-control" name="keywords" ></div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10"> <input type="text" value="{{$data[0]->description}}" class="form-control" name="description" ></div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Adres</label>
                        <div class="col-sm-10"> <input type="text" value="{{$data[0]->adres}}" class="form-control" name="adres" ></div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">Tel</label>
                        <div class="col-sm-10"> <input type="text" value="{{$data[0]->tel}}" class="form-control" name="tel" ></div>
                    </div>






                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <b>SMTP BİLGİLERİ</b>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Smtp Server</label>
                        <div class="col-sm-10"> <input type="text" value="{{$data[0]->smtpserver}}" class="form-control" name="smtpserver" > </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">smtpemail</label>
                        <div class="col-sm-10"> <input type="text" value="{{$data[0]->smtpemail}}" class="form-control" name="smtpemail" ></div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">smtppassword</label>
                        <div class="col-sm-10"> <input type="password" value="{{$data[0]->smtppassword}}" class="form-control" name="smtppassword" ></div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-2 control-label">smtpport</label>
                        <div class="col-sm-10"> <input type="text" value="{{$data[0]->smtpport}}" class="form-control" name="smtpport" ></div>
                    </div>

                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_3">
                    <b>HAKKIMIZDA SAYFASI</b>

                    <textarea name="hakkimizda">
                        {{$data[0]->hakkimizda}}

                    </textarea>

                </div>
                <div class="tab-pane" id="tab_4">
                    <b>İLETİŞİM SAYFASI</b>
                    <textarea name="iletisim">
                        {{$data[0]->iletisim}}

                    </textarea>
                </div>
                <!-- /.tab-pane -->


            </div>
                <input type="submit" class="btn btn-default" value="GUNCELLE">
            </form>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
    </div>

</div>


@endsection

@section("java")

    <script src="{{url('/')}}/assets/admin/bower_components/ckeditor/ckeditor.js"></script>

    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('hakkimizda')
            //bootstrap WYSIHTML5 - text editor
            //$('.textarea').wysihtml5()
        })
    </script>

    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('iletisim')
            //bootstrap WYSIHTML5 - text editor
            //$('.textarea').wysihtml5()
        })
    </script>

@endsection