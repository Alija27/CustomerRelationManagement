<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Leave;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\LeaveRequest;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role === "admin") {
            $leaves = Leave::all();
            return view("leaves.index", compact("leaves"));
        } else {


            $userleave = Leave::where("user_id", Auth::user()->id);
            $leaves = $userleave;
            return view("leaves.index", compact("leaves"));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("leaves.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeaveRequest $request)
    {

        $leave = $request->validated();
        $leave['user_id'] = Auth::user()->id;
        $leave["date"] = Carbon::today()->format("y-m-d");
        if ($request->hasFile('image')) {
            $name = str_replace(' ', '', auth()->user()->name) . Str::random(20);
            $leave['image'] = $this->uploadImage($request->file('image'), $name, "leave");
        }
        // dd($leave);
        Leave::create($leave);
        return redirect()->route('leaves.index');
    }


    public function uploadImage($file, $name, $folder)
    {
        $ext = $file->extension();
        $path = $name . "." . $ext;
        $file->storeAs("public/images/$folder", $path);
        return "images/$folder/$path";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        return view("leaves.show", compact("leave"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $leave = Leave::find($id);
        return view("leaves.edit", compact("leave"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        $data = $request->validate([
            "subject" => ["required"],
            // "image" => ["required"],
            "status" => ["required"]
        ]);
        // dd($leave);
        $leave->update($data);
        return redirect()->route('leaves.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
    }
}
