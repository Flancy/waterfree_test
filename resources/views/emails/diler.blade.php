{{ $request->name }}
{{ $request->email }}
@isset($request->phone)
	{{ $request->phone }}
@endisset
{{ $request->firm }}
{{ $request->city }}
@isset($request->comment)
	{{ $request->comment }}
@endisset