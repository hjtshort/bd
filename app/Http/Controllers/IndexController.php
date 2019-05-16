<?php

namespace App\Http\Controllers;

use App\models\city;
use App\models\direction;
use App\models\product;
use App\models\property;
use App\models\type;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $data['product'] = product::query()->join('property', 'property_id', '=', 'property.id')->join('type', 'type_id', '=', 'type.id')->join('district', 'district_id', '=', 'district.id')->join('city', 'city_id', '=', 'city.id')->orderBy('product.created_at', 'desc')->select('product.*', 'property_name', 'type_name', 'district_name', 'city_name')->limit(8)->get();
        $data['city'] = city::all();
        $data['direction'] = direction::all();
        $data['type'] = type::all();
        $data['property'] = property::all();
        $data['countAll'] = product::query()->count();
        return view('module.index-content', $data);
    }

    public function detail($slug)
    {
        $data = product::query()->join('property', 'property_id', '=', 'property.id')->join('type', 'type_id', '=', 'type.id')->join('district', 'district_id', '=', 'district.id')->join('city', 'city_id', '=', 'city.id')->where('product_slug', $slug)->orderBy('product.created_at', 'desc')->select('product.*', 'property_name', 'type_name', 'district_name', 'city_name')->firstOrFail();
        return view('module.chitiet', $data);
    }

}
