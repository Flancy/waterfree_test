<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Http\Requests\User\SettingRequest;

class SettingController extends Controller
{
    public function index()
    {
    	return view('user.setting.index')->with([
    		'user' => Auth::user()
    	]);
    }

    public function update(SettingRequest $request)
    {
    	$request = array_filter($request->all());

    	$user = Auth::user();

    	$user->fill($request)->save();

    	return redirect()->back()->with([
    		'message' => 'Данные успешно обновлены!'
    	]);
    }
}
