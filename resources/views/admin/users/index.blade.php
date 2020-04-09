@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.admin.nav')

            <div class="card">
                <div class="card-header">Административная панель - Все пользователи</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <input class="form-control" id="searchAdmin" type="text" placeholder="Поиск..">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Имя</th>
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->email }}</a></td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @if($user->activate == 0)
                                                <div class="alert alert-warning" role="alert">Не активирован</div>
                                            @else
                                                <div class="alert alert-success" role="alert">Активирован</div>
                                            @endif
                                        </td>
                                        <td>
                                            @if($user->role == 0)
                                                <button type="button" href="#" class="btn btn-danger" disabled>Удалить</button>
                                            @else
                                                <a href="#modalAdminDeleteUser" class="btn btn-danger" data-toggle="modal" data-target="#modalAdminDeleteUser">Удалить</a>
                                            @endif
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
</div>
@endsection

<!--Модальные окна-->
@include('modals.admin.modalAdminDeleteUser')