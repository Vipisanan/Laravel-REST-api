<?php

namespace App\Http\Controllers\Country;

use App\Http\Controllers\Controller;
use App\Models\CountryModel;
use Illuminate\Http\Request;
use Validator;

class Country extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(CountryModel::get() ,200);
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $country = CountryModel::find($id);
        if (is_null($country)){
            return response()->json(["message"=>"Not found data"] , 404);
        }
        return response()->json($country, 200);
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
        if (is_null(CountryModel::find($id))){
            return response()->json(["message"=>"Not found data"] , 404);
        }
        CountryModel::where('id' ,$id)->update($request->all());
        $country=CountryModel::find($id);
        return response()->json($country ,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null(CountryModel::find($id))){
            return response()->json(["message"=>"Not found data"] , 404);
        }
        CountryModel::where('id' ,$id)->delete();
        return response()->json('deleted' , 200);
    }
    public function login($name ,$dname){
        CountryModel::find($name ,$dname);
    }
}
