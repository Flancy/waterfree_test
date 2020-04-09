@extends('layouts.app')

@section('content')
<div class="container admin-cities-index">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.admin.nav')

            <div class="card">
                <div class="card-header">Административная панель - Все города</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div><br />
                    @endif
                    
                    <input class="form-control" id="searchAdmin" type="text" placeholder="Поиск..">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cities as $city)
                                    <tr>
                                        <td>{{ $city->id }}</td>
                                        <td><a href="{{ route('admin.cities.show', $city->id) }}">{{ $city->name }}</a></td>
                                        <td>
                                            <a href="#modalAdminDeleteCity" class="btn btn-danger" data-toggle="modal" data-target="#modalAdminDeleteCity">Удалить</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-2">
        <div class="col-md-12">
            <a href="#modalAdminAddCity" class="btn btn-primary" data-toggle="modal" data-target="#modalAdminAddCity">Добавить город</a>
        </div>
    </div>
</div>
@endsection

<!--Модальные окна-->
@include('modals.admin.modalAdminDeleteCity')
@include('modals.admin.modalAdminAddCity')