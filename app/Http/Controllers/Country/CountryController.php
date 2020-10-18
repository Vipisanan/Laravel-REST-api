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
        $country = CountryModel::find($id);
        if (is_null($country)){
            return response()->json("Not found data" , 404);
        }
        return response()->json($country, 200);
    }

    public function addCountry(Request $request){
        $country = CountryModel::create($request->all());
        return response()->json($country , 201);
    }

    public function updateCountry($id,Request $request ){
//        $country->update($request->all($id));
        if (is_null(CountryModel::find($id))){
            return response()->json("Not found data" , 404);
        }
        CountryModel::where('id' ,$id)->update($request->all());
        $country=CountryModel::find($id);
        return response()->json($country ,200);
    }

    public function deleteCountryById($id,Request $request ){
        if (is_null(CountryModel::find($id))){
            return response()->json("Not found data" , 404);
        }
        CountryModel::where('id' ,$id)->delete();
        return response()->json('deleted' , 200);
    }
}
