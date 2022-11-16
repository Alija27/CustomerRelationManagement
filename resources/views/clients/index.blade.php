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
    <div class="w-full overflow-auto bg-white border border-gray-200 shadow-md">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Clients</span>
            @if (auth()->user()->role != 'user')
                <a href="{{ route('clients.create') }}">
                    <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                        <i class="mr-1 fa-solid fa-plus"></i> Add New
                    </button>
                </a>
            @endif
        </div>
        <table class="max-w-full mx-5 my-5 display" id="myTable">
            <thead class="border-b">
                <tr class="bg-indigo-600 ">
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        SN.
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Name
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Email
                    </th>

                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Phonenumber
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Added_by
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Assigned_To
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Date of birth
                    </th>
                    @if (auth()->user()->role != 'user')
                        <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                            Task
                        </th>
                        <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                            Action
                        </th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr class="border-b">
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $loop->index + 1 }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $client->name }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $client->email }}
                        </td>

                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $client->phonenumber }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $client->user->name }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $client->assigned }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $client->dob }}
                        </td>
                        @if (auth()->user()->role != 'user')
                            <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                                <a href="{{ route('tasks.assignTask', $client->id) }}"> <button
                                        class="p-2 text-white bg-green-500 rounded-lg">Assign</button> </a>
                            </td>
                            <td class="text-sm font-medium whitespace-nowrap">
                                <a title="Edit" href="{{ route('clients.edit', $client) }}"> <span
                                        class="p-1 px-2 mr-2 text-white bg-blue-800 rounded"> <i
                                            class="fa-solid fa-pen-to-square"></i> </span></a><a title="View"
                                    href="{{ route('clients.show', $client) }}"> <span
                                        class="p-1 px-2 mr-2 text-white bg-green-800 rounded"> <i
                                            class="fa-solid fa-eye"></i> </span></a>
                                <span onclick="show({{ $client->id }})"
                                    class="p-1 px-2 mr-2 text-white bg-red-800 rounded cursor-pointer"> <i title="Delete"
                                        class="fa-solid fa-trash"></i></a> </span>


                            </td>
                        @endif

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
                    <form action="{{ route('clients.delete') }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="client_id" id="client_id">
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
            document.getElementById('client_id').value = $id;

            $('#deleteModal').removeClass('hidden');
        }

        function hide() {
            $('#deleteModal').addClass('hidden');
        }
    </script>
@endsection
