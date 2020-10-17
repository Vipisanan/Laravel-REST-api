<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CountryModel;

class CountryController extends Controller
{
    public function country(){
        return response()->json(CountryModel::get() ,200);
    }

    public function findCountryById($id){
        return response()->json(CountryModel::find($id) , 200);
    }

    public function addCountry(Request $request){
        $country = CountryModel::create($request->all());
        return response()->json($country , 201);
    }

    public function updateCountry($id,Request $request ){
//        $country->update($request->all($id));
        CountryModel::where('id' ,$id)->update($request->all());
        $country=CountryModel::find($id);
        return response()->json($country ,200);
    }
}
