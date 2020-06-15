@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.admin.nav')

            <div class="card">
                <div class="card-header">Административная панель - Промокоды</div>

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
                                    <th>Код</th>
                                    <th>Приз</th>
                                    <th>Статус</th>
                                    <th>Действия</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($promos as $promo)
                                    <tr>
                                        <td>{{ $promo->id }}</td>
                                        <td>{{ $promo->code }}</td>
                                        <td>
                                            <span class="badge badge-info">
                                                @if($promo->prize == '')
                                                    Нет приза
                                                @else
                                                    {{ $promo->prize }}
                                                @endif
                                            </span>
                                        </td>
                                        <td>
                                            @if($promo->status)
                                                <span class="badge badge-success">Использован</span>
                                            @else
                                                <span class="badge badge-success">Не использован</span>
                                            @endif
                                        </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.promo.destroy', $promo->id) }}" class="form-footer justify-content-center">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Удалить</button>
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
    </div>

    <div class="row justify-content-center mt-2">
        <div class="col-md-12">
            <a href="{{ route('admin.promo.create') }}" class="btn btn-primary">Добавить промокод</a>
        </div>
    </div>
</div>
@endsection