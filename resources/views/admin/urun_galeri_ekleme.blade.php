
    <div class="box-header with-border">
        <h3 class="box-title">Ürün Galeri Formu</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->

    <form class="form-horizontal" action="{{url('/')}}/admin/urun/galeri/{{ $veri[0]->Id }}" method="post" enctype="multipart/form-data" >
        @csrf
        <div class="box-body">
            <div class="form-group">
                Ürün Adı :<label  class="col-sm-2 control-label">{{ $veri[0]->adi }}</label>
            </div>
            <br>

            <hr>
            Ürün Galeri Resmi:
                <input type="file"  name="resim" onchange="javascript:this.form.submit();">
                <input type="hidden" name="id" value="{{ $veri[0]->Id }}">
                <button type="submit" class="btn btn-info pull-right">Ekle</button>

            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif

            <hr>
            <img src="{{url('/')}}/userfiles/{{ $veri[0]->resim }}" height="200">
            @foreach($resimler as $rs)
               <img src="{{url('/')}}/userfiles/{{ $rs->resim }}" height="200">
                <a href="{{url('/')}}/admin/urun/galerisil/{{$rs->Id}}"  onclick="return confirm('Silinecek Emin misin?')" > Sil</a>
            @endforeach

        </div>
        <!-- /.box-footer -->
    </form>

</div>

