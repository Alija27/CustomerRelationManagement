<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use App\Models\Client;
use App\Models\Purpose;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Taskcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view("tasks.index", compact("tasks"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->role != 'user') {
            return abort(403);
        } else {
            $users = User::all();
            $clients = Client::all();
            $departments = Department::all();
            $purposes = Purpose::all();
            return view("tasks.create", compact("users", "clients", "departments", "purposes"));
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
        $task = $request->validate([
            "user_id" => ["required"],
            "client_id" => ["required"],
            "department_id" => ["required"],
            "purpose_id" => ["required"],
            "remarks" => ["required"],
        ]);
        Task::create($task);
        return redirect()->route("tasks.index")->with("success", "Task created sucessfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $users = User::all();
        $departments = Department::all();
        $purposes = Purpose::all();

        return view("tasks.edit", compact("task", "users", "departments", "purposes"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {

        $data = $request->validate([
            "status" => ["nullable"],
            "department_id" => ["required"],
            "purpose_id" => ["required"],
            "remarks" => ["nullable"],
            "user_id" => ["required"],

        ]);
        $task->update($data);
        return redirect()->route('tasks.index')->with("success", "Task updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }

    public function deleteTask(Request $request)
    {

        $task = Task::find($request->tasks_id);
        $task->delete();

        return redirect()->back();
    }

    public function myTask()
    {
        $myta =  Task::where("user_id", Auth::user()->id)->get();
        return view("tasks.mytask", compact("myta"));
    }

    public function pending($id)
    {

        $task = Task::find($id);
        $task->status = "pending";
        $task->save();
        return redirect()->back()->with("success", "Status updated sucessfully");
    }

    public function processing($id)
    {

        $task = Task::find($id);
        $task->status = "processing";
        $task->save();
        return redirect()->back()->with("success", "Status updated sucessfully");
    }

    public function complete($id)
    {

        $task = Task::find($id);
        $task->status = "completed";
        $task->save();
        return redirect()->back()->with("success", "Status updated sucessfully");
    }

    public function assignTask($id)
    {
        // if (auth()->user()->role != 'user') {
        //     return abort(403);
        // } else {
        $users = User::all();
        $departments = Department::all();
        $purposes = Purpose::all();
        $client = Client::find($id);
        return view("tasks.create", compact("users", "client", "departments", "purposes"));
        // }
    }
}
