<?php

namespace App\Http\Controllers\Admin\Promo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Promo\PromoCreateRequest;

use App\Models\Promo;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.promo.index')->with([
            'promos' => Promo::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $code = $this->quickRandom();

        return view('admin.promo.create')->with([
            'code' => $code
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromoCreateRequest $request)
    {
        $promo = null;

        $request_new = $request->all();

        $request_new['code'] = $request->code;

        if($request->count !== null || $request->count > 1) {
            for ($i=0; $i < $request_new['count']; $i++) {
                $code = $this->quickRandom();

                $request_new['code'] = $code;

                $promo = Promo::create($request_new);
            }
        } else {
            $promo = Promo::create($request_new);
        }

        if(!$promo) {
            return redirect()->route('admin.promo.create')
                ->withErrors('Невозможно добавить промокод!');
        }

        return redirect()->route('admin.promo.index')
            ->withSuccess('Промокод успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function quickRandom($length = 7)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
