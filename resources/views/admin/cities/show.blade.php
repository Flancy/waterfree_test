@extends('layouts.app')

@section('content')
<div class="container admin-user-show admin-firm-show">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.admin.nav')

            <div class="card">
                <div class="card-header">Административная панель - Город <b>"{{ $city->name }}"</b> <b>(ID: {{ $city->id }})</b> </div>

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
                            <a class="nav-link" data-toggle="tab" href="#cities" role="tab">Фирмы</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active show" id="general" name="general" role="tabpanel">
                            
                        </div>
                        <div class="tab-pane fade" id="cities" name="cities" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="h3">Подключенные Фирмы</h3>

                                    <ul class="list-group">
                                        @foreach($citiesFirm as $firm)
                                            <li class="list-group-item">
                                                <form action="{{ route('admin.cities.destroyFirm', [$firm->id, $city->id]) }}" method="POST" class="form-destroy-city-firm">
                                                    @method('DELETE')
                                                    @csrf
                                                    <span style="height: 100%">{{ $firm->name }}</span>
                                                    <button type="submit"class="btn btn-danger btn-sm float-right">Отключить</a>
                                                </form>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <form method="POST" action="{{ route('admin.cities.destroy', $city->id) }}" class="form-footer justify-content-center">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Удалить город</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!--Модальные окна-->
@include('modals.admin.modalAdminDeleteCity')