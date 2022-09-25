<?php

namespace App\Http\Controllers\Admin;

use App\Models\Leave;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Termwind\Components\Raw;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::all();
        return view("admin.leaves.index", compact("leaves"));
    }

    public function approved(Request $request)
    {
        $data = $request->validate([
            "remarks" => ["required"],
            "leave_id" => ["required"],

        ]);

        $leave = Leave::findOrFail($data['leave_id']);
        $leave->remarks = $data['remarks'];
        $leave->status = 'approved';
        // dd($leave);
        $leave->save();
        return redirect()->route("admin.leaves");
    }

    public function rejected(Request $request)
    {
        $data = $request->validate([
            "remarks" => ["required"],
            "leave_id" => ["required"],
        ]);
        $leave = Leave::findOrFail($data['leave_id']);
        $leave->remarks = $data['remarks'];
        $leave->status = 'rejected';
        $leave->save();
        return redirect()->route("admin.leaves");
    }

    public function show($id)
    {
        $leave = Leave::find($id);
        return view("admin.leaves.show", compact("leave"));
    }
}
