@extends('layouts.app')

@section('content')
<div class="container admin-user-show">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.admin.nav')

            <div class="card">
                <div class="card-header">Административная панель - Добавление промокода</div>

                <div class="card-body">
                    @include('partials.errors')
                    @include('partials.success')

                    <form action="{{ route('admin.promo.store') }}" method="POST">
                        @method('POST')
                        @csrf

                        <input type="hidden" name="status" value="false">

                        <div class="form-group">
                            <label for="code">Код*:</label>
                            <input type="text" name="code" placeholder="Введите код" class="form-control" id="code" value="{{ $code }}">
                        </div>
                        <div class="form-group">
                            <label for="prize">Приз:</label>
                            <input type="text" name="prize" placeholder="Введите приз" class="form-control" id="prize">
                        </div>
                        <div class="form-group">
                            <label for="organization">Организация:</label>
                            <input type="text" name="organization" placeholder="Введите название организации" class="form-control" id="organization">
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон:</label>
                            <input type="text" name="phone" placeholder="Введите телефон организации" class="form-control" id="phone">
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес:</label>
                            <input type="text" name="address" placeholder="Введите адрес организации" class="form-control" id="address">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!--Модальные окна-->
@include('modals.admin.modalAdminDeleteUser')