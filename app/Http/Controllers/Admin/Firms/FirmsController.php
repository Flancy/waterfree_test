<?php

namespace App\Http\Controllers\Admin\Firms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Transliterate;
use App\Models\Firms;
use App\Models\City;
use App\Models\CityFirms;

class FirmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.firms.index')->with(['firms' => Firms::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $imageName = time().'.'.$request->logo->extension();  

        $pathLogo = $request->logo->move(public_path('images/logo_firms'), $imageName);

        $firmData = [
            'name' => $request->name,
            'slug' => Transliterate::transliterate($request->name),
            'logo' => '/images/logo_firms/'.$imageName,
        ];

        Firms::create($firmData);
   
        return redirect()->route('admin.firms.index')->with('status', 'Фирма успешно добавлен!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCity(Request $request, Firms $firm)
    {
        $validatedData = $request->validate([
            'city_id' => 'required',
        ]);

        foreach ($request->city_id as $city) {
            $firmId = $firm->id;

            if(CityFirms::where([
                    ['city_id', '=', $city],
                    ['firms_id', '=', $firmId]
                ])->get()->count() == 0) {
                CityFirms::create([
                    'city_id' => $city,
                    'firms_id' => $firmId
                ]);
            }
        }

        return redirect()->route('admin.firms.show', $firm->id)->with('status', 'Города успешно подключено!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Firms $firm)
    {
        return view('admin.firms.show')->with(['firm' => $firm, 'citiesFirm' => $firm->cities()->get(), 'cities' => City::all()]);
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
    public function destroy(Request $request, Firms $firm)
    {
        $firm->delete();
        
        if(!$firm) {
            $request->session()->flash('status', 'Ошибка удаления фирмы!');
            return redirect()->route('admin.firms.index');
        }

        $request->session()->flash('status', 'Фирма успешно удалена!');
        return redirect()->route('admin.firms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyCity(Request $request, Firms $firm, City $city)
    {
        $firm->cities()->detach($city->id);
        
        if(!$firm) {
            $request->session()->flash('status', 'Ошибка отключения города!');
            return redirect()->route('admin.firms.show', $firm->id);
        }

        $request->session()->flash('status', 'Город успешно отключен!');
        return redirect()->route('admin.firms.show', $firm->id);
    }
}
