@extends('layouts.app')
@section('main')
    <div class="top-0 w-full bg-white border border-gray-200 shadow-md ">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Income Information</span>
            <a href="{{ route('incomes.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <i class="fa-solid fa-arrow-left"></i> Go Back </button>
            </a>

        </div>
        <div class="p-6 m-6 ">

            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Particulars</label>
                <input class="w-full bg-gray-200 border border-gray-200" type="text" name="particulars" id="particulars"
                    disabled value={{ $income->particulars }}>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Amount</label>
                <input class="w-full bg-gray-200 border border-gray-200 bg-ray-200" type="text" name="amount"
                    id="amount" disabled value="{{ $income->amount }}">
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Remarks</label>
                <input class="w-full bg-gray-200 border border-gray-200" type="text" name="remarks" id="remarks"
                    disabled value="{{ $income->remarks }}">
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Date</label>
                <input class="w-full bg-gray-200 border border-gray-200" type="date" name="date" id="date"
                    disabled value={{ $income->date }}>
            </div>



        </div>

    </div>
@endsection
