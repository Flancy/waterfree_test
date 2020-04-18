<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\Order;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $user = Auth::user();

        /*$user_id = null;

        if(!Auth::guest()) {
            $user_id = Auth::id();
        }*/

    	$order_group_id = uniqid();

    	$orders = Array();
        $date_now = now();

        foreach ($request->products as $product) {
            array_push($orders, [
                'product_id' => $product['id'],
                'user_id' => $user->id,
                'city_id' => $user->city->id,
                'status' => Order::STATUS_WAIT,
                'order_group_id' => $order_group_id,
                'name' => $user->name,
                'phone' => $user->phone,
                'quantity' => $product['quantity'],
                'price' => $product['price'],
                'created_at' => $date_now,
                'updated_at' => $date_now
            ]);
        }

        $order = Order::insert($orders);

        return response()->json([
        	'status' => $order,
        ]);
    }
}
