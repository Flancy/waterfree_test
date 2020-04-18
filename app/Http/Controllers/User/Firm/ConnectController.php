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
        $request = collect($request->all());
        $request->forget('_token');

        $order_success = FirmConnect::firstOrCreate($request->all());

        if(!$order_success) {
            return redirect()->back()->withErros();
        }

    	return redirect()->back()->with([
    		'message' => 'Успешно добавлено в список заказов!'
    	]);
    }

    public function delete($id)
    {
        $firm_connect_deleted = FirmConnect::findOrFail($id);

        $firm_connect_deleted->delete();

        if($firm_connect_deleted) {
            return redirect()->back()->with([
                'message' => 'Успешно удалено из списка заказов!'
            ]);
        }
    }
}
