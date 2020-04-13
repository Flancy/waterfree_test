<?php

namespace App\Http\Controllers\User\Firm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Models\CityFirms;

class ConnectController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $city_firms = CityFirms::where('city_id', $user->city_id)->with(['firms'])->get();

    	return view('firm.connect.index')->with([
    		'user' => $user,
            'city_firms' => $city_firms
    	]);
    }

    public function update(Request $request)
    {
    	return redirect()->back()->with([
    		'message' => 'Данные успешно обновлены!'
    	]);
    }
}
