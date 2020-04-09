<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
    	$orders = Order::all();

    	$collection = collect($orders);

    	$unique = $collection->unique('order_group_id');

        return view('admin.orders.index')->with([
        	'orders' => $unique
        ]);
    }

    public function show($order_group_id)
    {
        $orders = Order::where('order_group_id', $order_group_id)->get();

        return view('admin.orders.show')->with([
    		'orders' => $orders,
    		'order_group_id' => $order_group_id
    	]);
    }
}
