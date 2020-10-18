<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CountryModel;
use Validator;

class CountryController extends Controller
{
    public function country(){
        return response()->json(CountryModel::get() ,200);
    }

    public function findCountryById($id){
        $country = CountryModel::find($id);
        if (is_null($country)){
            return response()->json(["message"=>"Not found data"] , 404);
        }
        return response()->json($country, 200);
    }

    public function addCountry(Request $request){
        $rules= [
            'name' => 'Required|min:3',
            'iso' => 'Required|min:2 | max:3'
        ];
        $validator = Validator::make($request->all() , $rules);
        if ($validator->fails()){
            return response()->json($validator->errors() , 400);
        }
        $country = CountryModel::create($request->all());
        return response()->json($country , 201);
    }

    public function updateCountry($id,Request $request ){
//        $country->update($request->all($id));
        if (is_null(CountryModel::find($id))){
            return response()->json(["message"=>"Not found data"] , 404);
        }
        CountryModel::where('id' ,$id)->update($request->all());
        $country=CountryModel::find($id);
        return response()->json($country ,200);
    }

    public function deleteCountryById($id,Request $request ){
        if (is_null(CountryModel::find($id))){
            return response()->json(["message"=>"Not found data"] , 404);
        }
        CountryModel::where('id' ,$id)->delete();
        return response()->json('deleted' , 200);
    }
}
