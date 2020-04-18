<?php

namespace App\Http\Controllers\User\Firm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Models\Products;

use App\Models\User\FirmConnect;

class ConnectController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $firm_connect = FirmConnect::where('user_id', $user->id)->get();

        $products = Products::where('city_id', $user->city_id)->get();

    	return view('firm.connect.index')->with([
    		'user' => $user,
            'products' => $products,
            'firm_connects' => $firm_connect
    	]);
    }

    public function update(Request $request)
    {
        $order_success = FirmConnect::create($request->all());

        if(!$order_success) {
            return redirect()->back()->withErros();
        }

    	return redirect()->back()->with([
    		'message' => 'Данные успешно обновлены!'
    	]);
    }
}
