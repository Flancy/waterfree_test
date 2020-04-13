@extends('layouts.app')

@section('content')
<div class="container mt-4 user-setting-index">
    <div class="row justify-content-center">
    	<div class="col-md-3">
    		@include('layouts.user.nav_firm')
    	</div>
        <div class="col-md-9">
            <h2 class="mb-3">Подключение заказов</h2>

            @include("partials.errors")
            @include("partials.success")

            <form action="" method="POST" class="form-add-city">
                @csrf
                <select class="selectpicker mb-3" multiple data-live-search="true" name="city_id[]" data-style="btn-primary">
                    @foreach($city_firms as $firm)
                        <option data-tokens="{{ $firm->firms->name }}" value="{{ $firm->firms->id }}">{{ $firm->firms->name }}</option>
                    @endforeach
                </select>

                <button type="submit" class="btn btn-success">Подключить +</button>
            </form>
        </div>
    </div>
</div>
@endsection