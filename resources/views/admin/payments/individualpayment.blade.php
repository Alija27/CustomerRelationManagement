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
            <span class="m-1 mx-4 my-4 text-2xl font-bold">{{ $user->name }}'s Payments</span>
            <a href="{{ route('admin.payments.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <i class="mr-2 fa-solid fa-arrow-left"></i> GoBack
                </button>
            </a>
        </div>
        <table class="max-w-full mx-5 my-5 display" id="myTable">
            <thead class="border-b">
                <tr class="bg-indigo-600 ">
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        SN.
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Month
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Salary
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Incentive Pay
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Tax
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Deduction Title
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Deduction Amount
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Net Pay
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                        Payment Date
                    </th>
                    <th sope="col" class="px-6 py-4 text-sm font-medium text-white">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $payment)
                    <tr class="border-b">
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $loop->index + 1 }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $payment->month }}
                        </td>

                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $payment->salary }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $payment->incentive_pay }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $payment->tax }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $payment->deduction_title }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $payment->deduction_amount }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $payment->net_pay }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            {{ $payment->payment_date }}
                        </td>
                        <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                            <a title="Edit" href="{{ route('admin.payments.edit', $payment) }}">
                                <span class="p-1 px-2 mr-2 text-white bg-blue-800 rounded"> <i
                                        class="fa-solid fa-pen-to-square"></i> </span>
                            </a>
                            <span title="Delete" onclick="show({{ $payment->id }})"
                                class="p-1 px-2 mr-2 text-white bg-red-800 rounded cursor-pointer"> <i
                                    class="fa-solid fa-trash"></i></a> </span>
                                    <a title="View & Print" href="{{ route('admin.payments.viewpayment', $payment) }}">
                                    <span
                                        class="p-1 px-2 mr-2 text-white bg-green-800 rounded cursor-pointer">
                                        <i class="fa-solid fa-eye"></i> </span>
                                    </a>
                        </td>



                    </tr>
                @endforeach
            </tbody>

        </table>

        <div id="deleteModal"
        class="fixed top-0 bottom-0 left-0 right-0 hidden bg-black bg-opacity-25 shadow-lg backdrop-blur-lg">
        <div class="flex items-center justify-center">
            <div class="px-10 py-10 font-bold bg-white rounded-lg shadow-lg mt-[15%]">
                <div>
                    Are You sure want to Delete?
                </div>
                <div class="flex justify-center mt-8 space-x-5">
                    <form action="{{ route('admin.payments.delete') }}" method="post">
                        @method('DELETE')
                        @csrf
                        <input type="hidden" name="payment_id" id="payment_id">
                        <button class="p-2 px-6 text-white bg-green-600 rounded-md">Yes</button>

                    </form>
                    <button onclick="hide()" class="p-2 px-6 text-white bg-red-600 rounded-md">No</button>
                </div>
            </div>
        </div>
    </div>
    
   {{--  <div id="myDiv">
My name is Alija Ghimire
    </div> --}}
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
            document.getElementById('payment_id').value = $id;

            $('#deleteModal').removeClass('hidden');
        }

        function hide() {
            $('#deleteModal').addClass('hidden');
        }

        function PrintDiv(myDiv) {
    var headstr = "<html><head><title>Booking Details</title></head><body>";
    var footstr = "</body>";
    var newstr = document.getElementById(myDiv).innerHTML;
    var oldstr = document.body.innerHTML;
    document.body.innerHTML = headstr+newstr+footstr;
    window.print();
    document.body.innerHTML = oldstr;
    return false;
}
    </script>
@endsection
