<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use App\Models\User;
use App\Models\Leave;
use App\Models\Client;
use App\Models\Income;
use App\Models\Ticket;
use App\Models\Attendence;
use App\Models\Expenditure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
        $attendence = Attendence::whereDate('date', Carbon::today())->where('user_id', auth()->user()->id)->first();
        $attendences = Attendence::where('user_id', auth()->user()->id)->count();
        $leaves = Leave::where('user_id', auth()->user()->id)->count();
        $clients = Client::all()->count();
        $this_month_attendence = Attendence::where('user_id', Auth::id())->whereYear('date', Carbon::now()->year)->whereMonth('date', Carbon::now()->month)->count();
        $client_birthday_total = Client::whereMonth('dob', Carbon::now()->month)->whereDay('dob', '>=', Carbon::now()->day)->orderByRaw('DAYOFYEAR(dob)')->count();
        $user_birthday_total = User::whereMonth('dob', Carbon::now()->month)->whereDay('dob', '>=', Carbon::now()->day)->orderByRaw('DAYOFYEAR(dob)')->count();
        $today_ticket = Ticket::whereYear('date', Carbon::now()->year)->whereMonth('date', Carbon::now()->month)->whereDay('date', Carbon::now()->day)->count();
        $upcomming_ticket = Ticket::whereYear('date', Carbon::now()->year)->whereMonth('date', Carbon::now()->month)->count();
        $today_income = Income::whereYear('date', Carbon::now()->year)->whereMonth('date', Carbon::now()->month)->whereDay('date', Carbon::now())->sum('amount');
        $today_expenditure = Expenditure::whereYear('date', Carbon::now()->year)->whereMonth('date', Carbon::now()->month)->whereDay('date', Carbon::now())->sum('amount');
        $now = now();
        $u_birthday = User::whereMonth('dob', $now->month)->whereDay('dob', '>=', $now->day)->orderByRaw('DAYOFYEAR(dob)')->get();
        foreach ($u_birthday as $user_birthday) {
            $today = Carbon::today();
            $dob = Carbon::parse($user_birthday->dob)->year(now()->format('y'))->format('y-m-d');
            $remainingday = $today->diffInDays(Carbon::parse($dob));
            $user_birthday->remaining = $remainingday;
        }

        $now = now();
        $c_birthday = Client::whereMonth('dob', $now->month)->whereDay('dob', '>=', $now->day)->orderByRaw('DAYOFYEAR(dob)')->get();
        foreach ($c_birthday as $user) {
            $today = Carbon::today();
            $dob = Carbon::parse($user->dob)->year(now()->format('y'))->format('y-m-d');
            $remainingday = $today->diffInDays(Carbon::parse($dob));
            $user->remaining = $remainingday;
        }

        // For Chart
        $before7days = \Carbon\Carbon::today()->subDays(7); // today - 7 days

        $last7daysnames = []; // retrieve last 7 days names in this array
        for ($i = 7; $i > 0; $i--) {
            $last7daysnames[] = (\Carbon\Carbon::today()->subDays($i)->format('l'));
        }

        // Get total income and expenditure for previous 7 days
        $last7daysincome = Income::selectRaw('sum(amount) as total_income, DAYNAME(created_at) as day')->where('created_at', '>=', $before7days)->groupBy('day')->orderBy('created_at')->get();
        $last7daysexp = Expenditure::selectRaw('sum(amount) as total_expenditure, DAYNAME(created_at) as day')->where('created_at', '>=', $before7days)->groupBy('day')->orderBy('created_at')->get();
        // [sunday, monday, tuesday] days
        // [
        //     {
        //         total_income => 2000,
        //         day => sunday
        //     }
        //     {
        //         total_income => 2000,
        //         day => monday
        //     } 
        //     {
        //         total_income => 2000,
        //         day => wednesday
        //     }
        // ]
        // get toatal income of every day in array
        $last7daysincomeAmount = collect($last7daysnames)->map(function ($name) use ($last7daysincome) {
            // $name = sunday
            foreach ($last7daysincome as $income) {
                if ($income->day == $name) {
                    return $income->total_income;
                }
            }
            return 0;
        });
        // $last7daysincomeAmount = [2000]

        // get total expenditure of every day in array
        $last7daysexpAmount = collect($last7daysnames)->map(function ($name) use ($last7daysexp) {
            foreach ($last7daysexp as $exp) {
                if ($exp->day == $name) {
                    return $exp->total_expenditure;
                }
            }
            return 0;
        });

        // final result for last 7 days income/expenditure report 
        $finalIncomeExpenditureReport = [
            'days' => $last7daysnames,
            'incomes' => $last7daysincomeAmount,
            'expenditures' => $last7daysexpAmount
        ];


        // Pie chart

        $task_pending_count = Task::where("user_id", Auth::id())->where('status', '=', "pending")->count();
        $task_processing_count = Task::where("user_id", Auth::id())->where('status', '=', "processing")->count();
        $task_completed_count = Task::where("user_id", Auth::id())->where('status', '=', "completed")->count();
        $total_tasks = Task::count();

        $pending_task_percent = $total_tasks == 0 ? 0 : (float)((float)$task_pending_count / $total_tasks) * 100;
        $processing_task_percent = $total_tasks == 0 ? 0 : (float)((float)$task_processing_count / $total_tasks) * 100;
        $completed_task_percent =  $total_tasks == 0 ? 0 : (float)((float)$task_completed_count / $total_tasks) * 100;

        $finalTaskReport = json_encode([
            [
                "name" => "Pending",
                "y" => $pending_task_percent
            ],
            [
                "name" => "Processing",
                "y" => $processing_task_percent
            ],
            [
                "name" => "Completed",
                "y" => $completed_task_percent
            ]
        ]);


        $months = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];


        $attendence_bar = array();


        foreach ($months as $month) {
            array_push($attendence_bar, Attendence::where("user_id", auth()->user()->id)->whereYear('date', Carbon::now()->year)->whereMonth('date', $month)->count());
        }
        $finalAttendenceReport = json_encode(collect($attendence_bar)->values());
        // dd($finalAttendenceReport);
        return view('dashboard', compact("attendences", 'attendence', 'leaves', 'clients', 'this_month_attendence', 'client_birthday_total', 'user_birthday_total', 'today_ticket', 'upcomming_ticket', 'today_income', 'u_birthday', 'c_birthday', 'today_expenditure', 'finalIncomeExpenditureReport', 'finalTaskReport', 'finalAttendenceReport'));
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
