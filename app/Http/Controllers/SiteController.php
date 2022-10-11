<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Leave;
use App\Models\Client;
use App\Models\Income;
use App\Models\Ticket;
use App\Models\Attendence;
use App\Models\Expenditure;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $attendence = Attendence::whereDate('date', Carbon::today())->where('user_id', auth()->user()->id)->first();

        $attendences = Attendence::where('user_id', auth()->user()->id)->count();
        $leaves = Leave::where('user_id', auth()->user()->id)->count();
        $clients = Client::all()->count();
        $this_month_attendence = Attendence::whereYear('date', Carbon::now()->year)->whereMonth('date', Carbon::now()->month)->count();
        $client_birthday = Client::whereMonth('dob', Carbon::now()->month)->whereDay('dob', '>=', Carbon::now()->day)->orderByRaw('DAYOFYEAR(dob)')->count();
        $user_birthday = User::whereMonth('dob', Carbon::now()->month)->whereDay('dob', '>=', Carbon::now()->day)->orderByRaw('DAYOFYEAR(dob)')->count();
        $today_ticket = Ticket::whereYear('date', Carbon::now()->year)->whereMonth('date', Carbon::now()->month)->whereDay('date', Carbon::now()->day)->count();
        $upcomming_ticket = Ticket::whereYear('date', Carbon::now()->year)->whereMonth('date', Carbon::now()->month)->count();
        $today_income = Income::whereYear('date', Carbon::now()->year)->whereMonth('date', Carbon::now()->month)->whereDay('date', Carbon::now())->sum('amount');
        $today_expenditure = Expenditure::whereYear('date', Carbon::now()->year)->whereMonth('date', Carbon::now()->month)->whereDay('date', Carbon::now())->sum('amount');

        return view('dashboard', compact("attendences", 'attendence', 'leaves', 'clients', 'this_month_attendence', 'client_birthday', 'user_birthday', 'today_ticket', 'upcomming_ticket', 'today_income'));
    }


    public function birthday()
    {
        $now = now();
        // return $now ?? "not available";
        $sorted = User::whereMonth('dob', $now->month)->whereDay('dob', '>=', $now->day)->orderByRaw('DAYOFYEAR(dob)')->get();
        foreach ($sorted as $user) {
            $today = Carbon::today();
            $dob = Carbon::parse($user->dob)->year(now()->format('y'))->format('y-m-d');
            $remainingday = $today->diffInDays(Carbon::parse($dob));
            $user->remaining = $remainingday;
        }
        // $remainingday = Carbon::parse(User::whereMonth('dob', $now->month)->whereDay('dob', '>=', $now->day)->orderBy('dob', 'ASC')->pluck('dob')->get());
        // $day = $now->diffInDays($remainingday);


        // $aftertoday = User::whereMonth('dob', '>=', $now->month)->whereDay('dob', '>=', $now->day)->orderByRaw('DAYOFYEAR(dob)')->get();
        // $beforetoday = User::whereMonth('dob', '<', $now->month)->whereDay('dob', '<', $now->day)->orderByRaw('DAYOFYEAR(dob)')->get();
        // $sorted =  ($aftertoday->merge($beforetoday));
        // foreach ($sorted as $user) {
        //     $today = Carbon::today();
        //     $dob = Carbon::parse($user->dob)->year(now()->format('y'))->format('y-m-d');
        //     $remainingday = $today->diffInDays(Carbon::parse($dob));
        //     $user->remaining = $remainingday;
        // }

        // return $aftertoday;
        return view("users.birthday", compact('sorted'));
    }

    public function clientbirthday()
    {
        $now = now();
        $sorted = Client::whereMonth('dob', $now->month)->whereDay('dob', '>=', $now->day)->orderByRaw('DAYOFYEAR(dob)')->get();
        foreach ($sorted as $user) {
            $today = Carbon::today();
            $dob = Carbon::parse($user->dob)->year(now()->format('y'))->format('y-m-d');
            $remainingday = $today->diffInDays(Carbon::parse($dob));
            $user->remaining = $remainingday;
        }
        return view("clients.birthday", compact('sorted'));
    }
}
