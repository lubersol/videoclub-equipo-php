<?php

namespace App\Http\Controllers;
use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RentController extends Controller
{
    public function index()
    {
        return Rent::all();
    }
    public function store(Request $request)
    {   
        $validator = Validator::make($request->all(), [
            'userId' => 'required',
            'title'=> 'required',
            'createdAt'=> 'required',
            'returnDate' => 'required',
        ]);
        if($validator->fails()){
            return [
                'created' => false,
                'errors' => $validator->errors()->all()
            ];
        }
        $data = $request->all();
        //dd($data);
        Rent::create($data);
        return $data;    
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Rent::find($id);
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
        $rent = Rent::findOrFail($id);
        $rent->fill($request->all());
        $rent->save();
        return $rent;
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rent = Rent::findOrFail($id);
        $rent ->delete();
        return $rent;
    }
}


