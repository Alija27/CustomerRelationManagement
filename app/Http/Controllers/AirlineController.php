<?php

namespace App\Http\Controllers;

use App\Models\Airline;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airlines = Airline::all();
        return view("airlines.index", compact("airlines"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("airlines.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $airline = $request->validate([
            "title" => ["required"],
            "type" => ["required"],
        ]);
        Airline::create($airline);
        return redirect()->route("airlines.index")->with("message", "Airlines Created Sucessfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Airlines  $airlines
     * @return \Illuminate\Http\Response
     */
    public function show(Airline $airline)
    {
        return view("airlines.show", compact("airline"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Airlines  $airlines
     * @return \Illuminate\Http\Response
     */
    public function edit(Airline $airline)
    {
        return view("airlines.edit", compact("airline"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Airlines  $airlines
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airline $airline)
    {
        $data = $request->validate([
            "title" => ["required"],
            "type" => ["required"],
        ]);
        $airline->update($data);
        return redirect()->route("airlines.index")->with("message", "Airlines Updated Sucessfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Airlines  $airlines
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airline $airline)
    {
        //
    }
    public function deleteAirline(Request $request)
    {
        $airline = Airline::find($request->airline_id);
        $airline->delete();
        return redirect()->back();
    }
}
