@extends('layouts.front.fmaster')

@section('title','Sepetim')

@section('keywords','')

@section('description','')

@section('sidebar')
    @include('front.usersidebar')
@endsection

@section('slider')

@endsection

@section('content')


    <hr class="soften">
    <div>
        <h1>SEPETİM ÜRÜNLER</h1>
    </div>
    <hr class="soften">
    <div class="row">
        <div class="span8">
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif

            <table class="table table-bordered">
                <tbody><tr>
                    <th>Id</th>
                    <th>Adı</th>
                    <th>Miktar</th>
                    <th >Fiyat</th>

                    <th >Tutar</th>
                    <th >Resim</th>
                    <th >Sil</th>
                </tr>
                <?php $top=0; ?>
                @foreach($veriler as $urun)
                    <tr>
                        <td>{{$urun->Id}}</td>
                        <td>{{$urun->adi}}</td>

                        <td>{{$urun->sfiyat}} TL</td>
                        <td>{{$urun->miktar}}</td>
                        <td>  {{$urun->sfiyat * $urun->miktar}} TL  </td>
                        <td>

                            <a href="{{url('/')}}/urun/{{$urun->Id}}">
                                <img src="{{url('/')}}/userfiles/{{$urun->resim}}" height="20">
                            </a>

                        </td>

                        <td >
                            <a href="{{url('/')}}/sepet_sil/{{$urun->Id}}" class="btn btn-block btn-danger btn-xs" onclick="return confirm('Silinecek Emin misin?')" > Sil</a>
                        </td>
                    </tr>
                    <?php $top=$top+$urun->sfiyat * $urun->miktar; ?>
                @endforeach

                </tbody></table>
                Sepet Toplamı : <?php echo $top; ?> TL

                <form method="post" action="{{url('/')}}/siparis_tamamla">
                    @csrf
                    <input type="hidden"  readonly name="toplam" value="<?php echo $top; ?>">
                    <input type="submit"  class="btn btn-success" value="SİPARİŞİ TAMAMLA">
                </form>


        </div>

    </div>



@endsection