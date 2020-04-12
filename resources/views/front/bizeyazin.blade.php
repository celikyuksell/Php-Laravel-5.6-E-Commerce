@extends('layouts.front.fmaster')

@section('title',$data[0]->adi)

@section('keywords',$data[0]->keywords)

@section('description',$data[0]->description)

@section('sidebar')
    @include('front.fsidebar')
@endsection

@section('slider')

@endsection

@section('content')


    <hr class="soften">
    <div>
        <h1>BİZE YAZIN</h1>
    </div>

    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{{ \Session::get('success') }}</p>
        </div><br />
    @endif
    <hr class="soften">
    <div class="row">
        <div class="span8">


            <div class="well well-small">

                <div class="row-fluid">


                    <div class="span6">

                        <form class="form-horizontal" method="post" action="{{url('/')}}/bize_yazin">
                            @csrf
                            <fieldset>
                                <div class="control-group">

                                    <input type="text" name="name" placeholder="Adı Soyadı"  required class="input-xlarge">

                                </div>
                                <div class="control-group">

                                    <input type="email" name="email" placeholder="E-mail" required class="input-xlarge">

                                </div>
                                <div class="control-group">

                                    <input type="text" name="subject" placeholder="Konu" required class="input-xlarge">

                                </div>
                                <div class="control-group">
                                    <textarea rows="3" name="message"  class="input-xxlarge" required></textarea>

                                </div>

                                <button class="shopBtn" type="submit">Mesajı Gönder</button>

                            </fieldset>
                        </form>
                    </div>
                </div>


            </div>

        </div>

    </div>



@endsection