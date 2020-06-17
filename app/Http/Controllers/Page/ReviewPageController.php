<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Htpp\Requests\Page\ReviewMailRequest;
use App\Mail\ReviewMail;

class ReviewPageController extends Controller
{
    public function index()
    {
    	return view('pages.review');
    }

    public function mail(ReviewMailRequest $request)
    {
    	$mail = Mail::to('flancyk.flancyk@yandex.ru')->send(new ReviewMail($request))->subject('MYHIM.RU - Мнение о сайте!');

        return redirect()->back()
            ->withSuccess('Спасибо за заявку! Наш менеджер скоро свяжется с Вами!');
    }
}