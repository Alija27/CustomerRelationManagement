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
        if (auth()->user()->role == 'user') {
            return abort(403);
        } else {
            return view("airlines.create");
        }
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
        return redirect()->route("airlines.index")->with("success", "Airlines Created Sucessfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Airlines  $airlines
     * @return \Illuminate\Http\Response
     */
    public function show(Airline $airline)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Airlines  $airlines
     * @return \Illuminate\Http\Response
     */
    public function edit(Airline $airline)
    {
        if (auth()->user()->role == 'user') {
            return abort(403);
        } else {
            return view("airlines.edit", compact("airline"));
        }
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
        return redirect()->route("airlines.index")->with("success", "Airlines Updated Sucessfully");
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
        if (auth()->user()->role == 'user') {
            return abort(403);
        } else {
            $airline = Airline::find($request->airline_id);
            $airline->delete();
            return redirect()->back();
        }
    }
}
