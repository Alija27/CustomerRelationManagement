@extends('layouts.app')
@section('main')
    <div class="top-0 w-full bg-white border border-gray-200 shadow-md ">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Create Payment</span>
            <a href="{{ route('admin.payments.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <i class="fa-solid fa-arrow-left"></i> Go Back </button>
            </a>

        </div>

        <form class="w-11/12 p-6 m-6 bg-white rounded-md" method="post" action={{ route('admin.payments.update',$payment) }}>
            @csrf
            @method("PUT")
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Month</label>
                <select class="w-full border border-gray-200" value="{{ old('month') }}" type="text"
                    name="month" id="month">
                    <option disabled selected>Choose Month</option>
                    <option value="January" @if ($payment->month == 'January') selected @endif>January</option>
                    <option value="February"@if ($payment->month == 'February') selected @endif>February</option>
                    <option value="March"@if ($payment->month == 'March') selected @endif>March</option>
                    <option value="April"@if ($payment->month == 'April') selected @endif>April</option>
                    <option value="May"@if ($payment->month == 'May') selected @endif>May</option>
                    <option value="June"@if ($payment->month == 'June') selected @endif>June</option>
                    <option value="July"@if ($payment->month == 'July') selected @endif>July</option>
                    <option value="August"@if ($payment->month == 'August') selected @endif>August</option>
                    <option value="September" @if ($payment->month == 'September') selected @endif>September</option>
                    <option value="October" @if ($payment->month == 'October') selected @endif>October</option>
                    <option value="November" @if ($payment->month == 'November') selected @endif>November</option>
                    <option value="December" @if ($payment->month == 'December') selected @endif>December</option>
                </select>
                <div class="text-red-700 ">
                    @error('month')
                        {{ $message }}
                    @enderror
                </div>

            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Salary</label>
                <input class="w-full border border-gray-200" value="{{ $payment->salary??old('salary') }}" type="number" name="salary"
                    id="salary">
                <div class="text-red-700 ">
                    @error('salary')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Incentive Pay</label>
                <input class="w-full border border-gray-200" value="{{ $payment->incentive_pay??old('incentive_pay') }}" type="number" name="incentive_pay"
                    id="incentive_pay">
                <div class="text-red-700 ">
                    @error('incentive_pay')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">User</label>
                <select class="w-full border border-gray-200"  type="text"
                    name="user_id" id="user_id">
               <option value="{{ $payment->user_id }}"> {{ $payment->user->name }} </option>
            </select>
                <div class="text-red-700 ">
                    @error('user_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Tax</label>
                {{-- <input  class="w-full border border-gray-200" type="text" name="role" id="role"> --}}
                <input class="w-full border border-gray-200" value="{{ $payment->tax??old('tax') }}" type="number" name="tax" id="tax">
                    {{-- @foreach (\App\Models\User::CRUD_ROLES as $role)
               <option value="{{$role}}"> {{$role}} </option>
               @endforeach --}}
                    
                <div class="text-red-700 ">
                    @error('tax')
                        {{ $message }}
                    @enderror
                </div>

            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Deduction Title</label>
                <input class="w-full border border-gray-200" value="{{ $payment->deduction_title??old('deduction_title') }}" type="text" name="deduction_title"
                    id="deduction_title">
                <div class="text-red-700 ">
                    @error('deduction_title')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Deduction Amount</label>
                <input class="w-full border border-gray-200" value="{{ $payment->deduction_amount??old('deduction_amount') }}" type="number"
                    name="deduction_amount" id="deduction_amount">
                   
                <div class="text-red-700 ">
                    @error('bloodgroup')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Payment Date</label>
                <input class="w-full border border-gray-200" value="{{$payment->payment_date??old('payment_date') }}" type="date" name="payment_date"
                    id="payment_date">
                <div class="text-red-700 ">
                    @error('payment_date')
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
