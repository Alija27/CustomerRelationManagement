@extends('layouts.app')



@section('main')
    @if (session('message'))
        {{ session('message') }}
    @endif
    <div class="w-full overflow-auto bg-white border border-gray-200 shadow-md">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold"> Payment Details</span>
            <a href="{{ route('admin.payments.show',$payment->user_id) }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <i class="mr-2 fa-solid fa-arrow-left"></i> GoBack
                </button>
            </a>
        </div>
        <div id="myDiv" class=" mx-5 ">

        
        <div class="mb-6">
            <label class="font-bold text-gray-600 text-md">Month :</label>
            {{ $payment->month }}
        </div>
        <div class="mb-6">
            <label class="font-bold text-gray-600 text-md">Salary :</label>
            {{ $payment->salary }}
        </div>
        <div class="mb-6">
            <label class="font-bold text-gray-600 text-md">Incentive Pay :</label>
            {{ $payment->incentive_pay }}
        </div>
        <div class="mb-6">
            <label class="font-bold text-gray-600 text-md">To :</label>
            {{ $payment->user->name }}
        </div>
        <div class="mb-6">
            <label class="font-bold text-gray-600 text-md">Deduction Title :</label>
            {{ $payment->deduction_title}}
        </div>
        <div class="mb-6">
            <label class="font-bold text-gray-600 text-md">Deduction Amount :</label>
            {{$payment->deduction_amount}}
        </div>
        <div class="mb-6">
            <label class="font-bold text-gray-600 text-md">Tax :</label>
            {{ $payment->tax}}%
        </div>
        <div class="mb-6">
            <label class="font-bold text-gray-600 text-md">Net Pay :</label>
            {{ $payment->net_pay }}
        </div>
        <div class="mb-6">
            <label class="font-bold text-gray-600 text-md">Payment Date :</label>
            {{ $payment->payment_date}}
        </div>
        
        
        
                </div>
                <div class="mb-6 float-right">
                    <span title="Print" onclick='PrintDiv("myDiv")'
                                                class="p-2 px-2 mr-2 text-white bg-yellow-800 rounded cursor-pointer">
                                            <i class="fa-solid fa-print"></i> </span>
                </div>
                            
                                    
                       

        
    </div>
    
   
    </div>
    
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    
    <script>
        
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
