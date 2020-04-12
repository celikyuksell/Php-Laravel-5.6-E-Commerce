@extends('layouts.front.fmaster')

@section('title',$urun[0]->adi)

@section('keywords',$urun[0]->keywords)

@section('description',$urun[0]->description)

@section('sidebar')
    @include('front.fsidebar')
@endsection

@section('content')
    <ul class="breadcrumb">
        <li><a href="{{url('/')}}">Anasayfa</a> <span class="divider">/</span></li>
        <li><a href="{{url('/urunler')}}">Ürünler</a> <span class="divider">/</span></li>
        <li class="active">Preview</li>
    </ul>
    <div class="well well-small">
        <div class="row-fluid">
            <div class="span5">
                <div id="myCarousel" class="carousel slide cntr">
                    <div class="carousel-inner">

                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div><br />
                        @endif

                        <div class="item active">
                            <a href="#"> <img src="{{url('/')}}/userfiles/{{ $urun[0]->resim }}" alt="" style="width:100%"></a>
                        </div>
                        @foreach($resimler as $rs)
                            <div class="item">
                                <a href="#"> <img src="{{url('/')}}/userfiles/{{ $rs->resim }}" alt="" style="width:100%"></a>
                            </div>
                        @endforeach
                     </div>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
                </div>
            </div>
            <div class="span7">
                <h3>{{$urun[0]->adi}} </h3>
                <hr class="soft"/>

                <form class="form-horizontal qtyFrm" method="post" action="{{url('/')}}/sepete_ekle">
                    <div class="control-group">
                        <label class="control-label">Fiyat :<span>{{$urun[0]->sfiyat}} TL </span></label>
                        <div class="controls">
                         Adet :   <input type="number" name="miktar" value="1" class="span6" max="{{$urun[0]->stok}}" >
                        </div>
                    </div>
                    @csrf
                    <input type="hidden" name="urunid" value="{{$urun[0]->Id}}">


                    <h4>Stoktaki ürün miktarı : {{$urun[0]->stok}} </h4>
                    <p>{{$urun[0]->description}}
                    <p>
                        <button type="submit" class="shopBtn"><span class=" icon-shopping-cart"></span> Sepete Ekle</button>
                </form>
            </div>
        </div>
        <hr class="softn clr"/>


        <ul id="productDetail" class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">Ürün Detayı</a></li>
            <li class=""><a href="#profile" data-toggle="tab">Önerilen Ürünler </a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Araçlar <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#cat1" data-toggle="tab">Category one</a></li>
                    <li><a href="#cat2" data-toggle="tab">Category two</a></li>
                </ul>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content tabWrapper">
            <div class="tab-pane fade active in" id="home">

                {{$urun[0]->aciklama}}
            </div>
            <div class="tab-pane fade" id="profile">
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox">  Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soft">
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox">  Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soft"/>
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox">  Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soft"/>
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox">  Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soften"/>
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox">  Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="cat1">
                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                <br>
                <br>
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/b.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox">  Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soften"/>
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/a.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox">  Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soften"/>
            </div>
            <div class="tab-pane fade" id="cat2">

                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox">  Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soften"/>
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox">  Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soften"/>
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox">  Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soften"/>
                <div class="row-fluid">
                    <div class="span2">
                        <img src="assets/img/d.jpg" alt="">
                    </div>
                    <div class="span6">
                        <h5>Product Name </h5>
                        <p>
                            Nowadays the lingerie industry is one of the most successful business spheres.
                            We always stay in touch with the latest fashion tendencies -
                            that is why our goods are so popular..
                        </p>
                    </div>
                    <div class="span4 alignR">
                        <form class="form-horizontal qtyFrm">
                            <h3> $140.00</h3>
                            <label class="checkbox">
                                <input type="checkbox">  Adds product to compair
                            </label><br>
                            <div class="btn-group">
                                <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
                                <a href="product_details.html" class="shopBtn">VIEW</a>
                            </div>
                        </form>
                    </div>
                </div>
                <hr class="soften"/>

            </div>
        </div>

    </div>
    </div>
    </div> <!-- Body wrapper -->

@endsection