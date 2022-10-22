@extends('layouts.app')
@section('css')
    <link rel="stylesheet"href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <style>
        body {
            overflow: hidden;
        }

        .dataTables_length select {
            width: 4em;
            height: 2em;
        }

        .dataTables_filter {
            margin-bottom: 1em
        }

        .dataTables_filter input {
            height: 2em
        }

        .dataTables_wrapper {
            margin: 0 20px
        }
    </style>
@endsection


@section('main')
    @if (session('message'))
        {{ session('message') }}
    @endif
    <div class="w-full overflow-x-scroll bg-white border border-gray-200 shadow-md">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">
                @if (request()->routeIs('tickets.index'))
                    All Tickets
                @elseif (request()->routeIs('ticket.domestic'))
                    Domestic Tickets
                @elseif (request()->routeIs('ticket.international'))
                    International Ticket
                @elseif (request()->routeIs('ticket.today'))
                    Today Tickets
                @endif
            </span>
            <a href="{{ route('tickets.create') }}">
                <button class="p-2 m-1 text-white bg-indigo-600 rounded">Add New</button>
            </a>
        </div>
        <div class="flex justify-end mb-6 border-b border-gray-200">
            <a href="{{ route('tickets.index') }}">
                <button class="p-2 m-1 text-white bg-indigo-600 rounded">All</button>
            </a>
            <a href="{{ route('ticket.today') }}">
                <button class="p-2 m-1 text-white bg-indigo-600 rounded">Today</button>
            </a>
            <a href="{{ route('ticket.domestic') }}">
                <button class="p-2 m-1 text-white bg-indigo-600 rounded">Domestic</button>
            </a>
            <a href="{{ route('ticket.international') }}">
                <button class="p-2 m-1 text-white bg-indigo-600 rounded">International</button>
            </a>
        </div>
        <table class="max-w-full mx-5 my-5 display " id="myTable">
            <thead class="border-b ">
                <tr class="bg-indigo-600 ">
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Client
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Date
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Time
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Ticket No
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Airline
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Airline Type
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Airline Pnr
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Departue
                    </th>
                    {{-- <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Destination
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Description
                    </th> --}}
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Action
                    </th>



                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr class="border-b">
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $ticket->client->name }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $ticket->date }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $ticket->time }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $ticket->ticket_no }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $ticket->airline->title }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $ticket->airline_type }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $ticket->airline_pnr }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $ticket->departure }}
                        </td>
                        {{-- <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $ticket->destination }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $ticket->description }}
                        </td> --}}


                        <td class="text-sm font-medium whitespace-nowrap">
                            <a href="{{ route('tickets.edit', $ticket) }}"> <span
                                    class="p-1 px-2 mr-2 text-white bg-blue-800 rounded"> <i
                                        class="fa-solid fa-pen-to-square"></i> </span></a>
                            <span onclick="show({{ $ticket->id }})"
                                class="p-1 px-2 mr-2 text-white bg-red-800 rounded cursor-pointer"> <i
                                    class="fa-solid fa-trash"></i></a> </span>







                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>


    </div>

    <div id="deleteModal"
        class="fixed top-0 bottom-0 left-0 right-0 hidden bg-black bg-opacity-25 shadow-lg backdrop-blur-lg">
        <div class="flex items-center justify-center">
            <div class="px-10 py-10 font-bold bg-white rounded-lg shadow-lg mt-[15%]">
                <div>
                    Are You sure want to Delete?
                </div>
                <div class="flex justify-center mt-8 space-x-5">
                    <form action="{{ route('tasks.delete') }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="tasks_id" id="tasks_id">
                        <button class="p-2 px-6 text-white bg-green-600 rounded-md">Yes</button>

                    </form>
                    <button onclick="hide()" class="p-2 px-6 text-white bg-red-600 rounded-md">No</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        function show($id) {
            document.getElementById('tasks_id').value = $id;

            $('#deleteModal').removeClass('hidden');
        }

        function hide() {
            $('#deleteModal').addClass('hidden');
        }
    </script>
@endsection
