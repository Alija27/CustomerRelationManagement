<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        foreach ($clients as $client) {
            $task = Task::where('client_id', $client->id)->latest()->first();
            if ($task == null) {
                $client->assigned = "-";
            } else {
                $client->assigned = $task->user->name;
            }
        }
        return view("clients.index", compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("clients.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $client = $request->validate([
            "name" => ["required"],
            "email" => ["required", "email", "unique:clients"],
            "address" => ["required"],
            "phonenumber" => ["required", 'digits:10', 'numeric', "regex:/(\+977)?[9][6-9]\d{8}/"],
            "dob" => ["required", "before:today"],

        ]);
        $client['user_id'] = Auth::user()->id;
        Client::create($client);
        return redirect()->route('clients.index')->with("success", "Client Created Sucessfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {

        $task = Task::where('client_id', $client->id)->latest()->first();
        $client->assigned = $task->user->name;

        return view("clients.show", compact("client"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CLient  $cLient
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        if (auth()->user()->role == 'user') {
            return abort(403);
        } else {

            return view("clients.edit", compact("client"));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            "name" => ["required"],
            "email" => ["required", "email"],
            "address" => ["required"],
            "phonenumber" => ["required", 'digits:10', 'numeric', "regex:/(\+977)?[9][6-9]\d{8}/"],
            "dob" => ["required", "before:today"],
        ]);
        $client->update($data);
        return redirect()->route('clients.index')->with("success", "Client Updated Sucessfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
    }

    public function deleteClient(Request $request)
    {
        if (auth()->user()->role == 'user') {
            return abort(403);
        } else {
            $user = Client::find($request->client_id);
            $user->delete();
            return redirect()->back();
        }
    }
}
