<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Attendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendence = Attendence::all();
        return view("attendence.index", compact("attendence"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attendence = new Attendence;
        $attendence->user_id = Auth::user()->id;
        $attendence->clock_in = Carbon::now()->format('H:i:s');
        //$attendence->clock_out = Carbon::now()->format('h-m-s');
        $attendence->date = Carbon::now()->format('y-m-d');
        // dd(Carbon::now()->format('H:i:s'));
        if (Attendence::where("date", Carbon::today()->format('y-m-d'))->exists()) {
            return redirect()->back()->with("message", "Already Clockin");
        }

        if (Auth::user()->entry_time < Carbon::now()->format('H:i:s')) {


            if ($request->reason == NULL) {
                return redirect()->back()->with("message", "Please enter reason to submit");
            }

            $attendence->late_entry = $request->reason;
        }

        $attendence->save();

        return redirect()->back()->with("message", "Clocked in sucessfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function show(Attendence $attendence)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendence $attendence)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendence $attendence)
    {
        /* $attendence->user_id = Auth::user()->id;
        $attendence->clock_out = Carbon::now()->format('H:i:s');

        if (Auth::user()->exit_time > Carbon::now()->format('H:i:s')) {


            if ($request->reason == NULL) {
                return redirect()->back();
            }

            $attendence->early_exit = $request->reason;
        }
        $attendence->save();
        return redirect()->back(); */



        $data['user_id'] = Auth::user()->id;
        $data['clock_out'] = Carbon::now()->format('H:i:s');

        if (Auth::user()->exit_time > Carbon::now()->format('H:i:s')) {


            if ($request->reason == NULL) {

                return redirect()->route('dashboard');
            }

            $data['early_exit'] = $request->reason;
        }
        $attendence->update($data);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendence  $attendence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendence $attendence)
    {
        //
    }
}
