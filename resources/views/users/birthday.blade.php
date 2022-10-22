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
            <span class="m-1 mx-4 my-4 text-2xl font-bold">User Birthday</span>

        </div>
        <table class="w-[96%] mx-5 my-5 display" id="myTable">
            <thead class="border-b">
                <tr class="px-8 bg-indigo-600">
                    <th sope="col" class="px-2 py-4 text-sm font-medium text-white border border-gray-200">
                        Name
                    </th>
                    <th sope="col" class="px-2 py-4 text-sm font-medium text-white border border-gray-200">
                        Email
                    </th>
                    <th sope="col" class="px-2 py-4 text-sm font-medium text-white border border-gray-200">
                        Address
                    </th>
                    <th sope="col" class="px-2 py-4 text-sm font-medium text-white border border-gray-200">
                        Phonenumber
                    </th>
                    <th sope="col" class="px-2 py-4 text-sm font-medium text-white border border-gray-200">
                        Date of Birth
                    </th>
                    <th sope="col" class="px-2 py-4 text-sm font-medium text-white border border-gray-200">
                        Remaining Days
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sorted as $user)
                    <tr
                        class="border-b  @if (Carbon\Carbon::create($user->dob)->format('mm/dd') == Carbon\Carbon::now()->format('mm/dd')) bg-green-500 font-bold text-white @else text-gray-900 font-medium @endif">
                        <td class="p-1 text-sm border border-gray-200 whitespace-nowrap">
                            {{ $user->name }}
                        </td>
                        <td class="p-1 text-sm border border-gray-200 whitespace-nowrap">
                            {{ $user->email }}
                        </td>
                        <td class="p-1 text-sm border border-gray-200 whitespace-nowrap">
                            {{ $user->address }}
                        </td>
                        <td class="p-1 text-sm border border-gray-200 whitespace-nowrap">
                            {{ $user->phonenumber }}
                        </td>
                        <td class="p-1 text-sm border border-gray-200 whitespace-nowrap ">
                            {{ \Carbon\Carbon::parse($user->dob)->format('M-d') }}

                        </td>
                        <td class="text-sm border border-gray-200 whitespace-nowrap">
                            {{ $user->remaining === 0 ? 'Today' : ($user->remaining == 1 ? $user->remaining . ' day' : $user->remaining . ' days') }}
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
