@extends('layouts.app')

@section('content')
<div class="container admin-firm-show">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.admin.nav')

            <div class="card">
                <div class="card-header">Административная панель - Фирма <b>"{{ $firm->name }}"</b> <b>(ID: {{ $firm->id }})</b> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="mt-3 nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#general" role="tab">Профиль</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cities" role="tab">Города</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active show" id="general" name="general" role="tabpanel">
                            <img src="{{ asset($firm->logo) }}" alt="" class="img-fluid">
                        </div>
                        <div class="tab-pane fade" id="cities" name="cities" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="h3">Подключенные города</h3>

                                    <ul class="list-group">
                                        @foreach($citiesFirm as $city)
                                            <li class="list-group-item">
                                                <form action="{{ route('admin.firms.destroyCity', [$firm->id, $city->id]) }}" method="POST" class="form-destroy-city-firm">
                                                    @method('DELETE')
                                                    @csrf
                                                    <span style="height: 100%">{{ $city->name }}</span> <button type="submit"class="btn btn-danger btn-sm float-right">Отключить</a>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h3 class="h3">Подключить города</h3>

                                    <form action="{{ route('admin.firms.storeCity', $firm->id) }}" method="POST" class="form-add-city">
                                        @csrf
                                        <select class="selectpicker" multiple data-live-search="true" name="city_id[]" data-style="btn-primary">
                                            @foreach($cities as $city)
                                                <option data-tokens="{{ $city->name }}" value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>

                                        <button type="submit" class="btn btn-success">Подключить +</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <form method="POST" action="{{ route('admin.firms.destroy', $firm->id) }}" class="form-footer justify-content-center">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Удалить фирму</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!--Модальные окна-->
@include('modals.admin.modalAdminDeleteFirm')