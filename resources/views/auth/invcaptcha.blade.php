@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h2 class="mb-4">{{ __('Верифицировать номер телефона') }}</h2>

            @include("partials.success")

            @include("partials.errors")

            <form method="POST" action="{{ route('api.verify-user.verifyContact') }}">
                @csrf

                <div class="form-group row">
                    <label for="phone" class="col-md-12 col-form-label">{{ __('Телефон') }}</label>

                    <div class="col-md-5">
                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Верифицировать') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
