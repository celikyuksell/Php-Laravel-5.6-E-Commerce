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
        <h1>SİPARİŞ ÜRÜNLERİ</h1>
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
                        <td>{{$siparis[0]->durum}}</td>
                    </tr>
                    <tr>
                        <th>Açiklama</th>
                        <td>{{$siparis[0]->aciklama}}</td>
                    </tr>
                    </tbody>
                </table>


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
                                <img src="{{url('/')}}/userfiles/{{$urun->resim}}" height="20">
                            </a>

                        </td>

                        <td >
                            @if ($siparis[0]->durum=='Yeni')
                                <a href="{{url('/')}}/urun_iade/{{$urun->Id}}" class="btn btn-block btn-danger btn-xs" onclick="return confirm('İade Edilecek Emin misin?')" > İPTAL</a>
                            @endif
                        </td>
                    </tr>
                    <?php $top=$top+$urun->tutar; ?>
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