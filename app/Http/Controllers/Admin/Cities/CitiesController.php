<?php

namespace App\Http\Controllers\Admin\Cities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Transliterate;
use App\Models\Firms;
use App\Models\City;
use App\Models\CityFirms;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.cities.index')->with(['cities' => City::all()]);
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
        ]);

        $cityData = [
            'name' => $request->name,
        ];

        City::create($cityData);
   
        return redirect()->route('admin.cities.index')->with('status', 'Город успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        return view('admin.cities.show')->with(['city' => $city, 'citiesFirm' => $city->firms()->get()]);
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
    public function destroy(Request $request, City $city)
    {
        $city->delete();
        
        if(!$city) {
            $request->session()->flash('status', 'Ошибка удаления города!');
            return redirect()->route('admin.cities.index');
        }

        $request->session()->flash('status', 'Город успешно удален!');
        return redirect()->route('admin.cities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyFirm(Request $request, Firms $firm, City $city)
    {
        $firm->cities()->detach($city->id);
        
        if(!$firm) {
            $request->session()->flash('status', 'Ошибка отключения фирмы!');
            return redirect()->route('admin.cities.show', $city->id);
        }

        $request->session()->flash('status', 'Фирма успешно отключена!');
        return redirect()->route('admin.cities.show', $city->id);
    }
}
