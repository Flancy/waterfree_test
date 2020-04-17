@extends('layouts.app')

@section('content')
<div class="container mt-4 user-setting-index">
    <div class="row justify-content-center">
    	<div class="col-md-3">
    		@include('layouts.user.nav_firm')
    	</div>
        <div class="col-md-9">
            <h2 class="mb-3">Подключение заказов</h2>

            @include("partials.errors")
            @include("partials.success")

            <input class="form-control" id="searchAdmin" type="text" placeholder="Поиск..">

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Изображение</th>
                            <th>Статус подключения</th>
                            <th>Название</th>
                            <th>Литраж</th>
                            <th>Город</th>
                            <th>Фирма</th>
                            <th>Действия</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td><img src="{{ $product->logo }}" class="img-fluid" style="max-height: 100px;"></td>
                                <td><span class="badge badge-warning">Не подключен</span></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->liter }} л.</td>
                                <td>{{ $product->cities->name }}</td>
                                <td>{{ $product->firms->name }}</td>
                                <td>
                                    <form action="{{ route('user.firm.connect.update') }}" method="POST">
                                        @csrf

                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                                        <input type="hidden" name="city_id" value="{{ $product->city_id }}">
                                        <input type="hidden" name="firm_id" value="{{ $product->firm_id }}">
                                        <input type="hidden" name="status" value="success">

                                        <button type="submit" class="btn btn-success">Подключить</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection