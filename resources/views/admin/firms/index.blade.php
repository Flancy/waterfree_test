@extends('layouts.app')

@section('content')
<div class="container admin-firms-index">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.admin.nav')

            <div class="card">
                <div class="card-header">Административная панель - Все фирмы</div>

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
                                @foreach($firms as $firm)
                                    <tr>
                                        <td>{{ $firm->id }}</td>
                                        <td><a href="{{ route('admin.firms.show', $firm->id) }}">{{ $firm->name }}</a></td>
                                        <td>
                                            <a href="#modalAdminDeleteFirm" class="btn btn-danger" data-toggle="modal" data-target="#modalAdminDeleteFirm">Удалить</a>
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
            <a href="#modalAdminAddFirm" class="btn btn-primary" data-toggle="modal" data-target="#modalAdminAddFirm">Добавить фирму</a>
        </div>
    </div>
</div>
@endsection

<!--Модальные окна-->
@include('modals.admin.modalAdminDeleteFirm')
@include('modals.admin.modalAdminAddFirm')