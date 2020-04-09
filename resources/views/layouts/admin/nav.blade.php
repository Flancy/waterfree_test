<nav class="admin-nav">
	<a href="{{ route('admin.home') }}" class="btn btn-primary {{ Route::is('admin.home') ? 'active' : '' }}">Главная</a>
	<a href="{{ route('admin.users.index') }}" class="btn btn-primary {{ Route::is('admin.users.index') ? 'active' : '' }}">Пользователи</a>
	<a href="{{ route('admin.cities.index') }}" class="btn btn-primary {{ Route::is('admin.cities.index') ? 'active' : '' }}">Города</a>
	<a href="{{ route('admin.firms.index') }}" class="btn btn-primary {{ Route::is('admin.firms.index') ? 'active' : '' }}">Фирмы</a>
	<a href="{{ route('admin.products.index') }}" class="btn btn-primary {{ Route::is('admin.products.index') ? 'active' : '' }}">Товары</a>
	<a href="{{ route('admin.orders.index') }}" class="btn btn-primary {{ Route::is('admin.orders.index') ? 'active' : '' }}">Заказы</a>
</nav>