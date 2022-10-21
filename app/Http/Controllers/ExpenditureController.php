<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Expenditure;
use Illuminate\Http\Request;

class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenditures = Expenditure::all();
        $total = Expenditure::sum('amount');
        $today = Expenditure::where('date', Carbon::now())->sum('amount');
        return view("expenditures.index", compact("expenditures", "total", "today"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("expenditures.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expenditure = $request->validate([
            "particulars" => ["required"],
            "amount" => ["required"],
            "remarks" => ["nullable"],
            "date" => ["required"]
        ]);
        Expenditure::create($expenditure);
        return redirect()->route("expenditures.index")->with("success", "Expenditure created sucessdully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function show(Expenditure $expenditure)
    {
        return view("expenditures.show", compact("expenditure"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenditure $expenditure)
    {
        return view("expenditure.edit", compact("expenditure"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expenditure $expenditure)
    {
        $data = $request->validate([
            "particulars" => ["required"],
            "amount" => ["required"],
            "remarks" => ["nullable"],
            "date" => ["required"]
        ]);
        $expenditure->update($data);
        return redirect()->route("expenditures.index")->with("success", "Expenditure created sucessdully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expenditure  $expenditure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expenditure $expenditure)
    {
        //
    }
}
