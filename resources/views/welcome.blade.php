@extends('layouts.app')

@section('content')

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