@extends('layouts.app')

@section('content')
<div class="container home-banner">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="owl-carousel owl-theme owl-default">
                <div class="item">
                    <img src="{{ asset('images/banners/1.jpg') }}" alt="" class="igm-fluid">
                </div>
                <div class="item">
                    <img src="{{ asset('images/banners/1.jpg') }}" alt="" class="igm-fluid">
                </div>
                <div class="item">
                    <img src="{{ asset('images/banners/1.jpg') }}" alt="" class="igm-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container products">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="h2">
                Продукция 
                @if(Session::get('city'))
                    -
                    {{ Session::get('city') }}
                @endif
            </h2>
        </div>
    </div>
    
    <products-list></products-list>
    
</div>
@endsection