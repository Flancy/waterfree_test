@extends('layouts.app')

@section('content')
<div class="container admin-firms-index">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.admin.nav')

            <div class="card">
                <div class="card-header">Заказ №{{ $order_group_id }}</div>

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
                    
                    <div>
                        <strong>Имя клиента:</strong> <span>{{ $orders->first()->user->name }}</span>
                    </div>
                    <div>
                        <strong>Город клиента:</strong> <span>{{ $orders->first()->city->name }}</span>
                    </div>
                    <div>
                        <strong>Телефон клиента:</strong> <span>{{ $orders->first()->user->phone }}</span>
                    </div>
                    <div>
                        <strong>Дата заказа:</strong> <span>{{ $orders->first()->created_at }}</span>
                    </div>

                        {{ $i = 0; }}

                    <div class="table-responsive mt-3">
                        <table class="table table-hover text-left">
                            <thead>
                                <tr>
                                    <th>Изображение</th>
                                    <th>Марка</th>
                                    <th>Цена ед/шт</th>
                                    <th>Литраж</th>
                                    <th>Количество</th>
                                    <th>Общая цена</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td><img src="{{ $order->product->logo }}" class="img-fluid" style="max-height: 100px;"></td>
                                        <td>{{ $order->product->firms->name }}</td>
                                        <td>{{ $order->product->price }} <i class="fa fa-rub" aria-hidden="true"></i></td>
                                        <td>{{ $order->product->liter }} л.</td>
                                        <td>{{ $order->quantity }}</td>
                                        <td>{{ $order->product->price * $order->quantity }} <i class="fa fa-rub" aria-hidden="true"></i></td>
                                    </tr>

                                    {{ $i++ }}
                                @empty
                                    <p>У вас пока нет заказов</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    div.
                </div>

                <div class="card-footer">
                    <form method="POST" action="{{ route('admin.orders.update', $order_group_id) }}" class="form-footer form-footer-ib">
                        @method('PUT')
                        @csrf
                        @if($orders->first()->status)
                            <input type="hidden" name="status" value="success">
                            <button type="submit" class="btn btn-warning">Принять заказ</button>
                        @else
                            <input type="hidden" name="status" value="wait">
                            <button type="submit" class="btn btn-success">Заказ на ожидании</button>
                        @endif
                    </form>
                    <form method="POST" action="{{ route('admin.orders.destroy', $order_group_id) }}" class="form-footer form-footer-ib">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Удалить заказ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!--Модальные окна-->
@include('modals.admin.modalAdminDeleteFirm')