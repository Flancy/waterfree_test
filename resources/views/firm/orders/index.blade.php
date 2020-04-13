@extends('layouts.app')

@section('content')
<div class="container mt-4 user-setting-index">
    <div class="row justify-content-center">
    	<div class="col-md-3">
    		@include('layouts.user.nav_firm')
    	</div>
        <div class="col-md-9">
            <h2 class="mb-3">Ваши заказы</h2>

            <div class="table-responsive">
            	<table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                <div class="p-2 px-3 text-uppercase">ID заказа</div>
                            </th>
                            <th>
                                <div class="p-2 px-3 text-uppercase">Город</div>
                            </th>
                            <th>
                                <div class="py-2 text-uppercase">Дата создания</div>
                            </th>
                            <th>
                                <div class="py-2 text-uppercase">Действие</div>
                            </th>
                            <th>
                                <div class="py-2 text-uppercase">Статус заказа</div>
                            </th>
                        </tr>
                    </thead>
            		<tbody>
            			@forelse ($orders as $order)
						    <tr>
	            				<td>{{ $order->order_group_id }}</td>
                                <td>{{ $order->city->name }}</td>
	            				<td>{{ $order->created_at }}</td>
	            				<td><a href="{{ route('user.firm.orders.show', $order->order_group_id) }}" class="link">Взять заказ</a></td>
	            				<td>
                                    @if($order->status == 'wait')
                                        <span class="badge badge-warning">В ожидании</span>
                                    @else
                                        <span class="badge badge-success">Принят</span>
                                    @endif
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