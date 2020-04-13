@extends('layouts.app')

@section('content')
<div class="container mt-4 user-setting-index">
    <div class="row justify-content-center">
    	<div class="col-md-3">
    		@include('layouts.user.nav_firm')
    	</div>
        <div class="col-md-9">
            <h2 class="mb-3">Настройки</h2>

            @include("partials.errors")
            @include("partials.success")

            <form method="POST" action="{{ route('user.firm.setting.update') }}">
                @csrf

                <div class="form-group row">
                    <label for="city_id" class="col-md-12 col-form-label">{{ __('Город') }}</label>

                    <div class="col-md-5">
                        <select class="selectpicker" data-live-search="true" name="city_id" data-style="btn-primary">
                            @foreach($citiesHeader ?? '' as $city)
                                <option value="{{ $city->id }}"
								@if($user->city_id === $city->id)
									selected="selected"
								@endif
                                >{{ $city->name }}</option>
                            @endforeach
                        </select>

                        @error('city_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-12 col-form-label">{{ __('Телефон') }}</label>

                    <div class="col-md-5">
                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $user->phone }}" required>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-12 col-form-label">{{ __('Пароль') }}</label>

                    <div class="col-md-5">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-12 col-form-label">{{ __('Повторите пароль*') }}</label>

                    <div class="col-md-5">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-5">
                        <button type="submit" class="btn btn-warning">
                            {{ __('Сохранить изменения') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection