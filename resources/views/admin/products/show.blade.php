@extends('layouts.app')

@section('content')
<div class="container admin-firm-show">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('layouts.admin.nav')

            <div class="card">
                <div class="card-header">Административная панель - Товар <b>"{{ $product->name }}"</b> <b>(ID: {{ $product->id }})</b> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="mt-3 nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#general" role="tab">Профиль</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade in active show" id="general" name="general" role="tabpanel">
                            <img src="{{ asset($product->logo) }}" alt="" class="img-fluid" style="max-height: 130px;">

                            <div class="row">
                                <div class="col-md-3"><strong>Контакты поставщиков:</strong></div>
                                <div class="col-md-9"><pre>{{ $product->comment }}</pre></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" class="form-footer justify-content-center">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Удалить товар</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!--Модальные окна-->
@include('modals.admin.modalAdminDeleteProduct')