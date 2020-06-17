<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Смена города
Route::get('/set_citie/{city}', function ($city) {
    Session::put('city', $city);

    return redirect()->back();
})->name('set_citie');

Auth::routes();

Route::get('/code', 'Auth\RegisterController@showCodeForm')->name('code');
Route::post('/code', 'Auth\RegisterController@storeCodeForm');

Route::get('/register_city', 'Auth\RegisterController@showRegistrationCityForm')->name('register_city');

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/pages/products', 'HomeController@pageProductIndex')->name('pages.products.index');

Route::get('/pages/contacts', 'HomeController@pageContactsIndex')->name('pages.contacts.index');

Route::get('/pages/service', 'HomeController@pageServiceIndex')->name('pages.service.index');

Route::get('/pages/diler', 'Page\DilerPageController@index')->name('pages.diler.index');
Route::post('/pages/diler', 'Page\DilerPageController@mail')->name('pages.diler.mail');

Route::get('/pages/promo', 'Page\PromoPageController@index')->name('pages.promo.index');

Route::get('/pages/review', 'Page\ReviewPageController@index')->name('pages.review.index');
Route::post('/pages/review', 'Page\ReviewPageController@mail')->name('pages.review.mail');

//Административная панель
Route::group([
		'middleware' => ['admin', 'web', 'auth'],
		'namespace' => 'Admin',
		'prefix' => 'admin',
		'as' => 'admin.'
	], function () {
	Route::get('/', 'HomeController@index')->name('home');

	//Пользователи
	Route::get('/users', 'Users\UsersController@index')->name('users.index');
	Route::get('/users/{user}', 'Users\UsersController@show')->name('users.show');
	Route::put('/users/{user}', 'Users\UsersController@update')->name('users.update');
	Route::delete('/users/{user}', 'Users\UsersController@destroy')->name('users.destroy');

	//Фирмы
	Route::get('/firms', 'Firms\FirmsController@index')->name('firms.index');
	Route::get('/firms/{firm}', 'Firms\FirmsController@show')->name('firms.show');
	Route::post('/firms', 'Firms\FirmsController@store')->name('firms.store');
	Route::put('/firms/{firm}', 'Firms\FirmsController@update')->name('firms.update');
	Route::delete('/firms/{firm}', 'Firms\FirmsController@destroy')->name('firms.destroy');

	//Фирмы (Удаление города)
	Route::delete('/firms/{firm}/{city}', 'Firms\FirmsController@destroyCity')->name('firms.destroyCity');

	//Фирмы (Подключение городов)
	Route::post('/firms/{firm}/add-city', 'Firms\FirmsController@storeCity')->name('firms.storeCity');

	//Города
	Route::get('/cities', 'Cities\CitiesController@index')->name('cities.index');
	Route::get('/cities/{city}', 'Cities\CitiesController@show')->name('cities.show');
	Route::post('/cities', 'Cities\CitiesController@store')->name('cities.store');
	Route::put('/cities/{city}', 'Cities\CitiesController@update')->name('cities.update');
	Route::delete('/cities/{city}', 'Cities\CitiesController@destroy')->name('cities.destroy');
	//Фирмы (Удаление города)
	Route::delete('/cities/{firm}/{city}', 'Cities\CitiesController@destroyFirm')->name('cities.destroyFirm');

	//Товары
	Route::get('/products', 'Products\ProductsController@index')->name('products.index');
	Route::get('/products/{product}', 'Products\ProductsController@show')->name('products.show');
	Route::post('/products', 'Products\ProductsController@store')->name('products.store');
	Route::put('/products/{product}', 'Products\ProductsController@update')->name('products.update');
	Route::delete('/products/{product}', 'Products\ProductsController@destroy')->name('products.destroy');

	//Товары
	Route::get('/orders', 'Orders\OrdersController@index')->name('orders.index');
	Route::get('/orders/{order_group_id}', 'Orders\OrdersController@show')->name('orders.show');
	Route::put('/orders/{order_group_id}', 'Orders\OrdersController@update')->name('orders.update');
	Route::delete('/orders/{order_group_id}', 'Orders\OrdersController@destroy')->name('orders.destroy');

	Route::resource('/promo', 'Promo\PromoController');
});

//Корзина
Route::resource('/cart', 'Cart\CartController');
Route::post('/cart/order/code', 'Cart\CartController@code')->name('cart.order.code');
Route::post('/cart/order/store', 'Cart\OrderController@store')->name('cart.order.store');

//Товары
Route::resource('/products', 'Api\ProductsController');

//Пользователь
Route::group([
		'middleware' => ['web', 'auth'],
		'namespace' => 'User',
		'as' => 'user.'
	], function () {
		Route::group([
			'middleware' => ['check_customer']
		], function () {
            //Главная
            Route::get('users', 'HomeController@index')->name('home');
			//Заказы
			Route::get('/user/orders', 'OrdersController@index')->name('orders.index');
			Route::get('/user/orders/{order_group_id}', 'OrdersController@show')->name('orders.show');

			//Настройки
			Route::get('/user/setting', 'SettingController@index')->name('setting.index');
			Route::post('/user/setting', 'SettingController@update')->name('setting.update');

			//Промокод
			Route::get('/user/code', 'PromoController@index')->name('code');
			Route::post('/user/code', 'PromoController@update')->name('code.update');
		});

		Route::group([
			'middleware' => ['check_firm']
		], function () {
			//Заказы
			Route::get('/firm/orders', 'Firm\OrdersController@index')->name('firm.orders.index');
			Route::get('/firm/orders/{order_group_id}', 'Firm\OrdersController@show')->name('firm.orders.show');

			//Настройки
			Route::get('/firm/setting', 'Firm\SettingController@index')->name('firm.setting.index');
			Route::post('/firm/setting', 'Firm\SettingController@update')->name('firm.setting.update');
			//Настройки
			Route::get('/firm/connect', 'Firm\ConnectController@index')->name('firm.connect.index');
			Route::post('/firm/connect', 'Firm\ConnectController@update')->name('firm.connect.update');
            Route::delete('/firm/connect/{firm_connect_id}', 'Firm\ConnectController@delete')->name('firm.connect.delete');

			//Баланс
			Route::get('/firm/balance', 'Firm\BalanceController@index')->name('firm.balance.index');
			Route::post('/firm/balance', 'Firm\BalanceController@update')->name('firm.balance.update');
		});
});

Route::get('/getip', 'Geo\IpUserController@getInfoIp');
Route::get('/getCityName/{slug}', 'Geo\IpUserController@getCityName');
