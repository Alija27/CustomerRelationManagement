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
            <span class="m-1 mx-4 my-4 text-2xl font-bold"> All Tasks</span>

        </div>
        <table class="max-w-full mx-5 my-5 display" id="myTable">
            <thead class="border-b">
                <tr class="bg-indigo-600 ">
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        SN.
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        User
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Client
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Department
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Purpose
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Remarks
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Status
                    </th>

                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Action
                    </th>



                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $tasks)
                    <tr class="border-b">
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $loop->index + 1 }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $tasks->user->name }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $tasks->client->name }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $tasks->department->title }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $tasks->purpose->name }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $tasks->remarks }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $tasks->status }}


                        </td>


                        <td class="text-sm font-medium whitespace-nowrap">
                            <div class="flex flex-row gap-2">
                                @if (auth()->user()->role != 'user')
                                    <a href="{{ route('tasks.edit', $tasks) }}" class="mt-2"> <span
                                            class="px-2 py-2 mr-2 text-white bg-blue-800 rounded"> <i
                                                class="fa-solid fa-pen-to-square"></i> </span></a>

                                    @if ($tasks->status === 'pending')
                                        <span onclick="show({{ $tasks->id }})"
                                            class="p-1 px-2 py-2 mr-2 text-white bg-red-800 rounded cursor-pointer"><i
                                                class="fa-solid fa-trash"></i></a> </span>
                                    @endif

                                    <form action="{{ route('task.pending', $tasks->id) }}" method="post">

                                        @csrf

                                        <button name="task_id" name="task_id" title="Pending"
                                            class="p-2 px-2 text-white bg-red-600 rounded-lg">
                                            <i class="fa fa-clock-rotate-left"></i></button>

                                    </form>

                                    <form action="{{ route('task.processing', $tasks->id) }}" method="post">
                                        @csrf
                                        <button name="task_id" id="task_id" title="Processing"
                                            class="px-2 py-2 text-white bg-green-600 rounded-md">
                                            <i class="mr-1 fa-solid fa-arrows-rotate fa-spin"></i></button>
                                    </form>

                                    <form action="{{ route('task.complete', $tasks->id) }}" method="post">
                                        @csrf
                                        <button name="task_id" id="task_id" title="Completed"
                                            class="px-2 py-2 text-white bg-yellow-600 rounded-md"><i
                                                class="fa-solid fa-check"></i></button>
                                    </form>
                                @endif
                            </div>
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
