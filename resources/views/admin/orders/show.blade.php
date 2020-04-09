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
                    
                    <input class="form-control" id="searchAdmin" type="text" placeholder="Поиск..">

                    <div class="table-responsive">
                        <table class="table table-hover text-left">
                            <thead>
                                <tr>
                                    <th>
                                        <div class="p-2 px-3 text-uppercase">Товар</div>
                                    </th>
                                    <th>
                                        <div class="py-2 text-uppercase">Цена</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td style="width: 40%">
                                            <img src="{{ $order->product->logo }}" alt="" width="70" class="img-fluid rounded">
                                            <div class="ml-3 d-inline-block align-middle">
                                                <h5 class="mb-0"><a href="#" class="text-dark d-inline-block">{{ $order->product->name }}</a></h5>
                                            </div>
                                        </td>
                                        <td class="align-middle">
                                            <strong>{{ $order->product->price }} <i class="fa fa-rub" aria-hidden="true"></i></strong>
                                        </td>
                                    </tr>
                                @empty
                                    <p>У вас пока нет заказов</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
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