@extends('layouts.app')

@section('content')
<div class="container mt-4 user-setting-index">
    <div class="row justify-content-center">
    	<div class="col-md-2">
    		@include('layouts.user.nav')
    	</div>
        <div class="col-md-10">
            <h2 class="mb-3">Заказ №{{ $order_group_id }}</h2>

            <div class="table-responsive">
            	<table class="table table-hover text-left">
                    <thead>
                        <tr>
                            <th>
                                <div class="p-2 px-3 text-uppercase">Товар</div>
                            </th>
                            <th>
                                <div class="py-2 text-uppercase">Количество</div>
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
                                    <strong>{{ $order->quantity }}</strong>
                                </td>
                                <td class="align-middle">
                                    <strong>{{ $order->price * $order->quantity }} <i class="fa fa-rub" aria-hidden="true"></i></strong>
                                </td>
                            </tr>
                        @empty
                            <p>У вас пока нет заказов</p>
                        @endforelse
                    </tbody>
            	</table>
            </div>
        </div>
    </div>
</div>
@endsection