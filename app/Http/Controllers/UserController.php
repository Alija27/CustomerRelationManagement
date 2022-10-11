<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view("users.index", compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => ["required"],
            "email" => ["required"],
            "password" => ["required"],
            "address" => ["required"],
            "phonenumber" => ["required"],
            "role" => ["required", /* Rule::in(User::CRUD_ROLES) */],
            "post" => ["required"],
            "dob" => ["required"],
            "bloodgroup" => ["required"],
            "entry_time" => ["required"],
            "exit_time" => ["required"],
        ], ["name.required" => "Please enter your name"]);
        $user = User::create($data);
        if ($user) {
            toastr()->success('Data has been saved successfully!');
        }

        return redirect()->route('users.index')->with("message", "User Created Sucessfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view("users.show", compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $data = $request->validate([
            "name" => ["required"],
            "email" => ["required"],
            "address" => ["required"],
            "phonenumber" => ["required"],
            "role" => ["required", /* Rule::in(User::CRUD_ROLES) */],
            "post" => ["required"],
            "dob" => ["required"],
            "bloodgroup" => ["required"],
            "entry_time" => ["required"],
            "exit_time" => ["required"],

        ]);

        $user->update($data);

        return redirect()->route('users.index')->with("message", "User Updated Sucessfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
    }
    public function deleteUser(Request $request)
    {
        $user = User::find($request->user_id);
        $user->delete();
        return redirect()->back();
    }

    public function viewTask($id)
    {
        $user = User::find($id);
        $task = Task::where("user_id", $user->id)->get();
        return view("users.task", compact("task"));
    }
}
