@extends('layouts.app')
@section('main')
    <div class="top-0 w-full bg-white border border-gray-200 shadow-md ">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Create Income</span>
            <a href="{{ route('incomes.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <i class="fa-solid fa-arrow-left"></i> Go Back </button>
            </a>

        </div>
        <form class="w-11/12 p-6 m-6 bg-white rounded-md" method="POST" action={{ route('incomes.store') }}>
            @csrf
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Particulars</label>
                <input class="w-full border border-gray-200 " type="text" name="particulars" id="particulars">
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Amount</label>
                <input class="w-full border border-gray-200" type="number" name="amount" id="amount">
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Remarks</label>
                <input class="w-full border border-gray-200" type="text" name="remarks" id="remarks">
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Date</label>
                <input class="w-full border border-gray-200" type="date" name="date" id="date">
            </div>
            <div class="mb-6">
                <Button class="p-2 px-4 text-white bg-indigo-600 rounded-xl">Create</Button>
            </div>
        </form>
    </div>
@endsection
