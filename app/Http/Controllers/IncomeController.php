<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incomes = Income::all();
        $total = Income::sum('amount');
        $today = Income::whereDay('date', Carbon::now())->sum('amount');
        $monthly = Income::whereYear('date', Carbon::now()->year)->whereMonth('date', Carbon::now()->month)->sum('amount');
        return view("incomes.index", compact("incomes", "total", "today", "monthly"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("incomes.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $income = $request->validate([
            "particulars" => ["required"],
            "amount" => ["required", "numeric"],
            "remarks" => ["nullable"],
            "date" => ["required"]
        ]);
        Income::create($income);
        return redirect()->route("incomes.index")->with("success", "Income created sucessdully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        return view("incomes.show", compact("income"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        return view("incomes.edit", compact("income"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        $data = $request->validate([
            "particulars" => ["required"],
            "amount" => ["required"],
            "remarks" => ["nullable"],
            "date" => ["required"]
        ]);
        $income->update($data);
        return redirect()->route("incomes.index")->with("success", "Income created sucessdully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        //
    }

    public function deleteIncome(Request $request)
    {
        $income = Income::find($request->income_id);
        $income->delete();
        return redirect()->back();
    }
}
