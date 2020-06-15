<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Http\Requests\Promo\CheckPromoRequest;

use App\Models\Promo;

class PromoController extends Controller
{
   	public function index()
   	{
   		$promos = Promo::where('user_id', Auth::id())->get();

   		return view('user.cabinet.code')->with([
   			'promos' => $promos
   		]);
   	}

   	public function update(CheckPromoRequest $request)
   	{
   		$promo = Promo::where('code', $request->code)->first();

		if($promo === null) {
			return redirect()->route('user.code')->with([
				'message' => '<h5 style="margin-bottom: 0">Вам повезет в следующий раз!</h5>'
			]);
		}

		$promo->user_id = Auth::id();
		$promo->status = true;

		$promo->update();

        if(!$promo) {
            return redirect()->route('user.code')->with([
				'message' => '<h5 style="margin-bottom: 0">Вам повезет в следующий раз!</h5>'
			]);
        }

        if($promo->prize == '') {
	        return redirect()->route('user.code')->with([
				'message' => '<h5 style="margin-bottom: 0">Вам повезет в следующий раз!</h5>'
			]);
        }

        return redirect()->route('user.code')->with([
				'message' => '<h5 style="margin-bottom: 0"><b>Поздравляем! Вы выиграли "' . $promo->prize . '"</b></h5>'
		]);
   	}
}
