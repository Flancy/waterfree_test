@extends('layouts.app')

@section('content')
<div class="container mt-4 user-cabinet-home">
    <div class="row justify-content-center">
    	<div class="col-md-2">
    		@include('layouts.user.nav')
    	</div>
        <div class="col-md-10">
            <h2 class="mb-3">Ввод промокода</h2>

            @include('partials.errors')
            @include('partials.success')

            @if(\Session::has('message'))
                <div class="alert alert-info">
                    {!! \Session::get('message') !!}
                </div>
            @endisset

            <form action="{{ route('user.code') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="code">Промокод:</label>
                    <input type="text" name="code" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Проверить</button>
                </div>
            </form>

            <h3 class="mt-3 mb-2">Использованные промокоды:</h3>

            @forelse($promos as $promo)
                <div class="alert alert-info">
                    <span class="badge badge-dark"><b>{{ $promo->code }}</b></span> -
                    @if($promo->prize == '')
                        Без выигрыша
                    @else
                        {{ $promo->prize }}
                    @endif
                </div>
            @empty
                <p>Вы еще не использовали ни один промокод</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
