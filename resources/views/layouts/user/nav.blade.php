<nav class="user-nav">
	<a href="{{ route('user.home') }}" class="btn btn-primary {{ Route::is('user.home') ? 'active' : '' }}">Кабинет</a>
	<a href="{{ route('user.code') }}" class="btn btn-primary {{ Route::is('user.code') ? 'active' : '' }}">Промокод</a>
	<a href="{{ route('user.setting.index') }}" class="btn btn-primary {{ Route::is('user.setting.index') ? 'active' : '' }}">Настройки</a>
	<a href="{{ route('user.orders.index') }}" class="btn btn-primary {{ Route::is('user.orders.index') ? 'active' : '' }}">Заказы</a>
	<a href="{{ route('logout') }}"
		onclick="event.preventDefault();
		document.getElementById('logout-form').submit();"
		class="btn btn-danger">Выход</a>
</nav>
