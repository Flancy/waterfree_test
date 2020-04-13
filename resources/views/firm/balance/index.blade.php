@extends('layouts.app')

@section('content')
<div class="container mt-4 user-setting-index">
    <div class="row justify-content-center">
    	<div class="col-md-3">
    		@include('layouts.user.nav_firm')
    	</div>
        <div class="col-md-9">
            <h2 class="mb-3">Ваш баланс: <span class="badge badge-success">500 <i aria-hidden="true" class="fa fa-rub"></i></span></h2>

            @include("partials.errors")
            @include("partials.success")
            
            <form action="{{ route('user.firm.balance.update') }}" method="POST">
                @csrf

                <div class="form-group row">
                    <label for="price" class="col-md-12 col-form-label">{{ __('Сумма к пополнению') }}</label>

                    <div class="col-md-5">
                        <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price')}}" required>

                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-success">
                            {{ __('Пополнить') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection