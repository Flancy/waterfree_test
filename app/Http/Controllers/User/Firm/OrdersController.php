<?php

namespace App\Http\Controllers\User\Firm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Models\Order;
use App\Models\User\FirmConnect;

class OrdersController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $orders = Array();

        $all_order_for_city = Order::where('city_id', $user->city_id)->get();

        $orders_collection = collect($all_order_for_city);
        $orders_collection = $orders_collection->unique('order_group_id');

    	$firm_connects = FirmConnect::where('user_id', $user->id)->get();

    	foreach($firm_connects as $firm_connect) {
    	    foreach($orders_collection as $order) {
    	        if($firm_connect->product_id == $order->product_id) {
    	            array_push($orders, $order);
                }
            }
        }

    	return view('firm.orders.index')->with([
    		'orders' => $orders,
    	]);
    }

    public function show($order_group_id)
    {
        $orders = Order::where('order_group_id', $order_group_id)->get();

        return view('firm.orders.show')->with([
    		'orders' => $orders,
    		'order_group_id' => $order_group_id
    	]);
    }
}
