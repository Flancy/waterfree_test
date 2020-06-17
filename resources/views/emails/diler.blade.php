<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if(env('production'))
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @endif

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Waterfree') }}</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/ico">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<table>
		<tr>
			<td><b>ФИО:</b></td>
			<td>{{ $request->name ?? '' }}</td>
		</tr>
		<tr>
			<td><b>E-mail:</b></td>
			<td>{{ $request->email ?? '' }}</td>
		</tr>
		<tr>
			<td><b>Телефон:</b></td>
			<td>{{ $request->phone ?? '' }}</td>
		</tr>
		<tr>
			<td><b>Фирма:</b></td>
			<td>{{ $request->firm ?? '' }}</td>
		</tr>
		<tr>
			<td><b>Город:</b></td>
			<td>{{ $request->city ?? '' }}</td>
		</tr>
		<tr>
			<td><b>Комментарий:</b></td>
			<td>{{ $request->comment ?? '' }}</td>
		</tr>
	</table>
</body>
</html>