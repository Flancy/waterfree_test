@extends('layouts.app')

@section('content')

<div class="container products">
	<div class="row justify-content-center">
		<div class="col-sm-7">
            <h2 class="h2">
                Дилерам - оставить заявку
            </h2>
        </div>
    </div>
</div>

<div class="container diler">
	<div class="row justify-content-center">
		<div class="col-sm-7">
			<div class="card">
				<div class="card-body">
					@include('partials.errors')
					@include('partials.success')

					<form action="{{ route('pages.diler.mail') }}" class="form" method="POST">
						@csrf
						<div class="form-group">
							<label for="name">Как к Вам обращаться (ФИО):*</label>
							<input type="text" name="name" class="form-control">
						</div>
						<div class="form-group">
							<label for="email">Ваш E-mail для связи:*</label>
							<input type="email" name="email" class="form-control">
						</div>
						<div class="form-group">
							<label for="phone">Ваш номер телефона для связи:</label>
							<input type="phone" name="phone" class="form-control">
						</div>
						<div class="form-group">
							<label for="firm">Название вашей фирмы:*</label>
							<input type="text" name="firm" class="form-control">
						</div>
						<div class="form-group">
							<label for="city">Город:*</label>
							<input type="text" name="city" class="form-control">
						</div>
						<div class="form-group">
							<label for="comment">Комментарий:</label>
							<textarea name="comment" class="form-control"></textarea>
						</div>

						<div class="form-group">
							<button class="btn btn-primary" type="submit">Оставить заявку</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection