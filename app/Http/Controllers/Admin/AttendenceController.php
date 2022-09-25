<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attendence;
use App\Models\User;
use Illuminate\Http\Request;

class AttendenceController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("admin.attendences.index", compact("users"));
    }

    public function show($id)
    {
        $user = User::find($id);
        $attendences = Attendence::where('user_id', $user->id)->get();
        // dd($attendences);
        return view('admin.attendences.show', compact("attendences"));
    }
}
