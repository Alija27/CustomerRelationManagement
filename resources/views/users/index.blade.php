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
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Users</span>
            @if (auth()->user()->role === 'admin')
                <a href="{{ route('users.create') }}">
                    <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                        <i class="fa-solid fa-plus"></i> Add New
                    </button>
                </a>
            @endif
        </div>
        <table class="max-w-full mx-5 my-5 display" id="myTable">
            <thead class="border-b">
                <tr class="bg-indigo-600 ">
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white border border-gray-200">
                        SN.
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white border border-gray-200">
                        Name
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white border border-gray-200">
                        Email
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white border border-gray-200">
                        Address
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white border border-gray-200">
                        Phonenumber
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white border border-gray-200">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b">
                        <td class="text-sm font-medium text-gray-900 border border-gray-200 whitespace-nowrap">
                            {{ $loop->index + 1 }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 border border-gray-200 whitespace-nowrap">
                            {{ $user->name }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 border border-gray-200 whitespace-nowrap">
                            {{ $user->email }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 border border-gray-200 whitespace-nowrap">
                            {{ $user->address }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 border border-gray-200 whitespace-nowrap">
                            {{ $user->phonenumber }}
                        </td>
                        <td class="text-sm font-medium border border-gray-200 whitespace-nowrap">
                            <a title="Edit" href="{{ route('users.edit', $user) }}"> <span
                                    class="p-1 px-2 mr-2 text-white bg-blue-800 rounded"> <i
                                        class="fa-solid fa-pen-to-square"></i> </span></a>
                            <span title="Delete" onclick="show({{ $user->id }})"
                                class="p-1 px-2 mr-2 text-white bg-red-800 rounded cursor-pointer"> <i
                                    class="fa-solid fa-trash"></i></a> </span>
                            <a title="View Details" href="{{ route('users.show', $user->id) }}"><span
                                    class="p-1 px-2 mr-2 text-white bg-green-800 rounded cursor-pointer"> <i
                                        class="fa-solid fa-eye"></i></span></a>
                            <a href="{{ route('user.task', $user->id) }}"><span
                                    class="p-1 px-2 mr-2 text-white bg-green-500 rounded cursor-pointer"> View
                                    Task</span></a>
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
                    <form action="{{ route('users.delete') }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="user_id" id="user_id">
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
            document.getElementById('user_id').value = $id;

            $('#deleteModal').removeClass('hidden');
        }

        function hide() {
            $('#deleteModal').addClass('hidden');
        }
    </script>
@endsection
