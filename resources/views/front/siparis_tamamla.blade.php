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
        <h1>SİPARİŞ TAMAMLAMA</h1>
    </div>
    <hr class="soften">
    <div class="row">
        <div class="span8">
            @if (\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ \Session::get('success') }}</p>
                </div><br />
            @endif

                <form method="post" action="{{url('/')}}/satinal">
                    @csrf
                    Sipariş Tutarı: <input type="text" readonly name="toplam" value="<?php echo $toplam; ?>"> <br>
                    <hr>
                    KARGO BİLGİLERİ <br>
                    Adı Soyadı...: <input name="adsoy" value="{{$user[0]->name}}"> <br>
                    Addresi......: <input name="adres" value="{{$user[0]->adres}}"> <br>
                    Şehir........: <input name="sehir" value="{{$user[0]->sehir}}"> <br>
                    Tel........: <input name="tel" value="{{$user[0]->tel}}"> <br>
                    <hr>
                    KREDİ KARTI BİLGİLERİ <br>
                    Adı Soyadı...: <input name="kadsoy" > <br>
                    Kart No......: <input name="kartno" > <br>
                    Son kullanım Tarihş Ay/Yıl: <input name="ay" > /<input name="yil" ><br>
                    Güvenlik Numarası (CVC): <input name="cvc" ><br>
                    <hr>
                    <input type="submit"  class="btn btn-success" value="SATINAL">
                </form>



        </div>

    </div>



@endsection