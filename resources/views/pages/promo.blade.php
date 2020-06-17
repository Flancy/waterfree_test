@extends('layouts.app')

@section('content')

<div class="container products">
	<div class="row">
		<div class="col-sm-12">
            <h2 class="h2">
                Что такое "Промокоды" и как их исспользовать?
            </h2>
        </div>
    </div>
</div>

<div class="container promo-page service">
	<div class="row">
		<div class="col-sm-12">
			<p>
				<strong>Промокод</strong> - это набор цифр и/или букв для получения вознаграждения в нашем сервисе.
			</p>
			<p>
				Дорогие друзья! <br><br>
				Каждый из вас имеет возможность выиграть от 50 рублей и до современного смартфона "iPhone". <br>
				Получить промокод сервиса <a href="https://myhim.ru">MYHIM.RU</a>, Вы у операторов автомобильных моек в Вашем городе. <br>
				<a href="{{ route('pages.contacts.index') }}"><strong>Список городов</strong></a>
			</p>
			<p>
				Чтобы использовать промокоды, прежде всего, необходимо <a href="{{ route('register') }}">зарегистрироваться</a> у нас на сервисе. <br>
				Далее в личном кабинете перейти в раздел <a href="{{ route('user.code') }}">"промокоды"</a> и ввести Ваш промокод. В этом же разделе Вы можете наблюдать все Ваши промокоды и призы, которые вы выиграли. <br><br>
				Удачи!
			</p>
		</div>
	</div>
</div>
@endsection