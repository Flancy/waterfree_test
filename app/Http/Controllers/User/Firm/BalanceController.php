<?php

namespace App\Http\Controllers\User\Firm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\AdaptivePayments;

class BalanceController extends Controller
{
    public function index()
    {
    	return view('firm.balance.index')->with([
    		'user' => Auth::user()
    	]);
    }

    public function update(Request $request)
    {
    	$provider = new ExpressCheckout;

    	$data = [];
		$data['items'] = [
		    [
		        'name' => 'Пополнение баланса',
		        'price' => $request->price,
		        'desc'  => 'Waterfree - пополнение баланса',
		        'qty' => 1
		    ]
		];

		$data['invoice_id'] = 1;
		$data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
		$data['return_url'] = url('/firm/balance');
		$data['cancel_url'] = url('/firm/balance');

		$total = 0;
		foreach($data['items'] as $item) {
		    $total += $item['price']*$item['qty'];
		}

		$data['total'] = $total;
    	
    	$response = $provider->setExpressCheckout($data);

		 // This will redirect user to PayPal
		return redirect($response['paypal_link']);
    }
}
