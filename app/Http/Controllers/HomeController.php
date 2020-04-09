<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;

use Session;

use App\Filters\ProductsFilter;
use App\Models\Products;
use App\Models\City;
use App\Models\Firms;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public $query;

    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if($request->has('_token')) {
            $this->query = $request->all();

            Arr::forget($this->query, '_token');
        }

        if(Session::get('city')) {
            $city_id = City::where('name', Session::get('city'))->firstOrFail();

            $products = Products::where($this->query)
                ->where('city_id', $city_id->id)
                ->paginate(8);
        } else {
            $products = Products::where($this->query)
                ->paginate(8);
        }

        return view('welcome')->with([
            'products' => $products
        ]);
    }

    public function pageProductIndex(Request $request)
    {
        if($request->has('_token')) {
            $this->query = $request->all();

            Arr::forget($this->query, '_token');
        }

        if(Session::get('city')) {
            $city_id = City::where('name', Session::get('city'))->firstOrFail();

            $products = Products::where($this->query)
                ->where('city_id', $city_id->id)
                ->paginate(8);
        } else {
            $products = Products::where($this->query)
                ->paginate(8);
        }

        return view('pages.products')->with([
            'products' => $products,
            'firms' => Firms::all()
        ]);
    }
}
