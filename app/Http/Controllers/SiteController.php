<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Leave;
use App\Models\Attendence;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $attendence = Attendence::whereDate('date', Carbon::today())->where('user_id', auth()->user()->id)->first();

        $attendences = Attendence::where('user_id', auth()->user()->id)->count();



        return view('dashboard', compact("attendences", 'attendence'));
    }

    public function birthday()
    {
        $userbirthday = User::whereDate("dob", Carbon::now()->format('y-m-d'))->get();




        return view("users.birthday", compact("userbirthday"));
    }
}
