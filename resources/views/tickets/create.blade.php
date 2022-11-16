@extends('layouts.app')
@section('main')
    <div class="w-full bg-white border border-gray-200 shadow-md">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Create Ticket</span>
            <a href="{{ route('tickets.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <i class="mr-1 fa-solid fa-arrow-left"></i>Go Back </button>
            </a>

        </div>

        <form class="w-11/12 p-6 m-6 overflow-auto bg-white rounded-md " method="POST" action={{ route('tickets.store') }}>
            @csrf
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Client</label>
                <select class="w-full border border-gray-200 " name="client_id" id="client_id" value={{ old('client_id') }}>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">
                            {{ $client->name }}
                        </option>
                    @endforeach
                </select>
                <div class="text-red-700 ">
                    @error('client_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Date</label>
                <input type="date" class="w-full border border-gray-200 " value="{{ old('date') }}" name="date"
                    id="date">
                <div class="text-red-700 ">
                    @error('date')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Time</label>
                <input type="time" class="w-full border border-gray-200 " value="{{ old('time') }}" name="time"
                    id="time">
                <div class="text-red-700 ">
                    @error('time')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Ticket No</label>
                <input type="text" class="w-full border border-gray-200 "name="ticket_no" id="ticket_no"
                    value="{{ old('ticket_no') }}">
                <div class="text-red-700 ">
                    @error('ticket_no')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Airlines</label>
                <select class="w-full border border-gray-200 " value="{{ old('airline_id') }}" name="airline_id"
                    id="airline_id">

                    @foreach ($airlines as $airline)
                        <option value="{{ $airline->id }}">
                            {{ $airline->title }}
                        </option>
                    @endforeach
                </select>
                <div class="text-red-700 ">
                    @error('airline_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Airline Type</label>
                <select class="w-full border border-gray-200 " value="{{ old('airline_type') }}" name="airline_type"
                    id="airline_type">

                    <option value="domestic">
                        Domestic
                    </option>
                    <option value="international">
                        International
                    </option>


                </select>
                <div class="text-red-700 ">
                    @error('airline_type')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Airline Pnr</label>
                <input type="text" class="w-full border border-gray-200 " value="{{ old('airline_pnr') }}"
                    name="airline_pnr" id="airline_pnr">
                <div class="text-red-700 ">
                    @error('airline_pnr')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Departure</label>
                <input type="text" class="w-full border border-gray-200 " value="{{ old('departure') }}"
                    name="departure" id="departure">
                <div class="text-red-700 ">
                    @error('departure')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Destination</label>
                <input type="text" class="w-full border border-gray-200 " value="{{ old('destination') }}"
                    name="destination" id="destination">
                <div class="text-red-700 ">
                    @error('destination')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Description</label>
                <textarea type="date" class="w-full border border-gray-200 " value="{{ old('description') }}" name="description"
                    id="description"></textarea>
                <div class="text-red-700 ">
                    @error('description')
                        {{ $message }}
                    @enderror
                </div>
            </div>





            <div class="mb-6">
                <Button class="p-2 px-4 text-white bg-indigo-600 rounded-xl">Create</Button>
            </div>
        </form>
    </div>
@endsection
