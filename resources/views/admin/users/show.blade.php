@extends('layouts.app')

@section('content')
<div class="container admin-user-show">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.admin.nav')

            <div class="card">
                <div class="card-header">Административная панель - Пользователь <b>"{{ $user->name }}"</b> <b>(ID: {{ $user->id }})</b> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-sm-2">
                            <b>Роль пользователя:</b>
                        </div>
                        <div class="col-sm-10">
                            @if($user->role == 2)
                                <p>Фирма доставки</p>
                            @elseif($user->role == 1)
                                <p>Обычный пользователь</p>
                            @elseif($user->role == 0)
                                <p>Администратор</p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="form-footer justify-content-center">
                        @method('PUT')
                        @csrf
                        @if($user->activate)
                            <input type="hidden" name="activate" value="0">
                            <button type="submit" class="btn btn-warning">Деактивировать пользователя</button>
                        @else
                            <input type="hidden" name="activate" value="1">
                            <button type="submit" class="btn btn-success">Активировать пользователя</button>
                        @endif
                    </form>
                    <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" class="form-footer justify-content-center">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Удалить пользователя</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!--Модальные окна-->
@include('modals.admin.modalAdminDeleteUser')