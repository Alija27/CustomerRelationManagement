@extends('layouts.app')
@section('main')
    <div class="w-full bg-white border border-gray-200 shadow-md">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Edit Ticket</span>
            <a href="{{ route('tickets.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <- Go Back </button>
            </a>

        </div>
        @if ($errors->any())
            {{ $errors }}
        @endif
        <form class="w-11/12 p-6 m-6 overflow-auto bg-white rounded-md " method="POST"
            action={{ route('tickets.update', $ticket) }}>
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Client</label>
                <select class="w-full border border-gray-200 " name="client_id" id="client_id">
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}" @if ($client->id == $client->id) selected @endif>
                            {{ $client->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Date</label>
                <input type="date" class="w-full border border-gray-200 " name="date" id="date"
                    value={{ $ticket->date }}>

            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Time</label>
                <input type="time" class="w-full border border-gray-200 " name="time" id="time"
                    value={{ $ticket->time }}>

            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Ticket No</label>
                <input type="text" class="w-full border border-gray-200 " name="ticket_no" id="ticket_no"
                    value={{ $ticket->ticket_no }}>
            </div>

            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Airlines</label>
                <select class="w-full border border-gray-200 " name="airline_id" id="airline_id">

                    @foreach ($airlines as $airline)
                        <option value="{{ $airline->id }}" @if ($airline->id == $airline->id) selected @endif>
                            {{ $airline->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Airline Type</label>
                <select class="w-full border border-gray-200 " name="airline_type" id="airline_type">

                    <option value="domestic" @if ($ticket->airline_type == 'domestic') selected>
                        Domestic
                    </option>
                    <option value="international"@if ($ticket->airline_type == 'international') selected
                        >
                        International
                    </option>
                </select>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Airline Pnr</label>
                <input type="text" class="w-full border border-gray-200 " name="airline_pnr" id="airline_pnr"
                    value={{ $ticket->airline_pnr }}>

            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Departure</label>
                <input type="text" class="w-full border border-gray-200 " name="departure" id="departure"
                    value={{ $ticket->departure }}>

            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Destination</label>
                <input type="text" class="w-full border border-gray-200 " name="destination" id="destination"
                    value={{ $ticket->destination }}>

            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Description</label>
                <textarea type="date" class="w-full border border-gray-200 " name="description" id="description">{{ $ticket->description }}</textarea>

            </div>





            <div class="mb-6">
                <Button class="p-2 px-4 text-white bg-indigo-600 rounded-xl">Create</Button>
            </div>
        </form>
    </div>
@endsection
