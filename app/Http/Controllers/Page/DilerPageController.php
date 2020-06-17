<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Mail;

use App\Mail\DilerMail;

class DilerPageController extends Controller
{
    public function index()
    {
    	return view('pages.diler');
    }

    public function mail(Request $request)
    {
    	$mail = Mail::to('flancyk.flancyk@yandex.ru')->send(new DilerMail($request));

    	if(!$promo) {
            return redirect()->back()
                ->withErrors('Ошибка отправки!');
        }

        return redirect()->back()
            ->withSuccess('Спасибо за заявку! Наш менеджер скоро свяжется с Вами!');
    }
}
