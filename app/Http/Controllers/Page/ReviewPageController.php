<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Mail;

use App\Http\Requests\Mail\ReviewMailRequest;
use App\Mail\ReviewMail;

class ReviewPageController extends Controller
{
    public function index()
    {
    	return view('pages.review');
    }

    public function mail(ReviewMailRequest $request)
    {
    	$mail = Mail::to('flancyk.flancyk@yandex.ru')->send(new ReviewMail($request));

        return redirect()->back()
            ->withSuccess('Спасибо за заявку! Наш менеджер скоро свяжется с Вами!');
    }
}
