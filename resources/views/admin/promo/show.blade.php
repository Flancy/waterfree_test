@extends('layouts.app')

@section('content')
<div class="container admin-user-show">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.admin.nav')

            <div class="card">
                <div class="card-header">Административная панель - Промокод <b>(ID: {{ $promo->id }})</b> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hovered">
                            <tbody>
                                <tr>
                                    <td><b>Код:</b></td>
                                    <td>{{ $promo->code }}</td>
                                </tr>
                                <tr>
                                    <td><b>Приз:</b></td>
                                    <td>{{ $promo->prize }}</td>
                                </tr>
                                <tr>
                                    <td><b>Статус:</b></td>
                                    <td>
                                        @if($promo->status)
                                            <span class="badge badge-success">Использован</span>
                                        @else
                                            <span class="badge badge-success">Не использован</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Организация:</b></td>
                                    <td>{{ $promo->organization }}</td>
                                </tr>
                                <tr>
                                    <td><b>Телефон:</b></td>
                                    <td>{{ $promo->phone }}</td>
                                </tr>
                                <tr>
                                    <td><b>Адрес:</b></td>
                                    <td>{{ $promo->address }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    <form method="POST" action="{{ route('admin.promo.destroy', $promo->id) }}" class="form-footer justify-content-center">
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