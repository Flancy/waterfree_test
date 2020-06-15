@extends('layouts.app')

@section('content')
    <div class="container container-cart">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="h2">Корзина</h2>
            </div>
        </div>
    </div>

    @if(Auth::check())
        <cart-page :cities="{{ $citiesHeader }}" auth="{{ Auth::check() }}" :auth_user="{{ Auth::user() }}" :auth_city="{{ Auth::user()->city_id }}"></cart-page>
    @else
        <cart-page :cities="{{ $citiesHeader }}" auth="{{ Auth::check() }}" auth_user="''" :auth_city="''"></cart-page>
    @endif
@endsection
