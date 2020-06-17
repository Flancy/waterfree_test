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