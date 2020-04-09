@extends('layouts.app')

@section('content')
<div class="container container-cart">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="h2">Корзина</h2>
        </div>
    </div>
</div>

<cart-page :cities="{{ $citiesHeader }}"></cart-page>
@endsection
