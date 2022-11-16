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
            <span class="m-1 mx-4 my-4 text-2xl font-bold"> All Attendences</span>

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
                        Address
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Phonenumber
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Role
                    </th>
                    {{-- <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                    Today Attendences
                </th> --}}

                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b">
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $loop->index + 1 }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $user->name }}
                        </td>

                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $user->address }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $user->phonenumber }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $user->role }}
                        </td>

                        <td class="text-sm font-medium whitespace-nowrap">
                            <a title="View" href="{{ route('admin.attendence.show', $user->id) }}"><span
                                    class="p-1 px-2 mr-2 text-white bg-green-800 rounded cursor-pointer"> <i
                                        class="fa-solid fa-eye"></i></span></a>
                        </td>

                    </tr>
                @endforeach
            </tbody>

        </table>


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
