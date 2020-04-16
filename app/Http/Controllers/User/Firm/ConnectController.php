<?php

namespace App\Http\Controllers\User\Firm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Models\CityFirms;
use App\Models\Products;

class ConnectController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $products = Products::where('city_id', $user->city_id)->get();
        
        $collection = collect($products);

        $unique = $collection->unique('order_group_id');

    	return view('firm.connect.index')->with([
    		'user' => $user,
            'products' => $unique
    	]);
    }

    public function update(Request $request)
    {
        dd($request->all());

    	return redirect()->back()->with([
    		'message' => 'Данные успешно обновлены!'
    	]);
    }
}
