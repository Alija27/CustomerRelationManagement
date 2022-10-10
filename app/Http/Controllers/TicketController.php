<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Ticket;
use App\Models\Airline;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->routeIs('tickets.index')) {
            $tickets = Ticket::all();
            return view("tickets.index", compact("tickets"));
        }
        if (request()->routeIs('ticket.domestic')) {


            $tickets = Ticket::where('airline_type', 'domestic')->get();

            return view("tickets.index", compact("tickets"));
        }
        if (request()->routeIs('ticket.international')) {


            $tickets = Ticket::where('airline_type', 'international')->get();

            return view("tickets.index", compact("tickets"));
        }
        if (request()->routeIs('ticket.today')) {


            $tickets = Ticket::where('date', Carbon::today())->get();

            return view("tickets.index", compact("tickets"));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $clients = Client::all();
        $airlines = Airline::all();
        return view("tickets.create", compact("clients", "airlines"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $time = Carbon::now()->format("H:i");
        dd($time);
        $ticket = $request->validate([
            "client_id" => ["required"],
            "date" => ["required", "after:yesterday"],
            "time" => ["required", "date_format:H:i|after:$time"],
            "ticket_no" => ["required"],
            "airline_type" => ["required"],
            "airline_id" => ["required"],
            "airline_pnr" => ["required"],
            "departure" => ["required"],
            "destination" => ["required"],
            "description" => ["required"],
        ]);
        Ticket::create($ticket);
        return redirect()->route("tickets.index")->with("message", "Ticket booked sucessfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view("tickets.show", compact("ticket"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $clients = Client::all();
        $airlines = Airline::all();
        return view("tickets.edit", compact("ticket", "clients", "airlines"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $data = $request->validate([
            "client_id" => ["required"],
            "date" => ["required"],
            "time" => ["required"],
            "ticket_no" => ["required"],
            "airline_id" => ["required"],
            "airline_pnr" => ["required"],
            "departure" => ["required"],
            "destination" => ["required"],
            "description" => ["required"],
        ]);
        $ticket->update($data);
        return redirect()->route("tickets.index")->with("message", "Ticket updated sucessfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
