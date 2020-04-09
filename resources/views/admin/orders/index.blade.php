@extends('layouts.app')

@section('content')
<div class="container admin-firms-index">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.admin.nav')

            <div class="card">
                <div class="card-header">Административная панель - Все заказы</div>

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
                                    <th>Город</th>
                                    <th>Имя</th>
                                    <th>Телефон</th>
                                    <th>Статус</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->city->name }}</td>
                                        <td><a href="{{ route('admin.orders.show', $order->order_group_id) }}">{{ $order->name }}</a></td>
                                        <td>{{ $order->phone }}</td>
                                        <td>
                                            @if($order->status == 'wait')
                                                <span class="badge badge-warning">В ожидании</span>
                                            @else
                                                <span class="badge badge-success">Принят</span>
                                            @endif
                                        </td>
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
</div>
@endsection

<!--Модальные окна-->
@include('modals.admin.modalAdminDeleteFirm')