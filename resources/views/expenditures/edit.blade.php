@extends('layouts.app')
@section('main')
    <div class="top-0 w-full bg-white border border-gray-200 shadow-md ">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Edit Expenditure</span>
            <a href="{{ route('incomes.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <i class="fa-solid fa-arrow-left"></i> Go Back </button>
            </a>

        </div>
        <form class="w-11/12 p-6 m-6 bg-white rounded-md" method="POST"
            action={{ route('expenditures.update', $expenditure) }}>
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Particulars</label>
                <input class="w-full border border-gray-200 "
                    value="{{ old('particulars') ?? $expenditure->particulars }}"type="text" name="particulars"
                    id="particulars">
                <div class="text-red-700 ">
                    @error('particulars')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Amount</label>
                <input class="w-full border border-gray-200"
                    value="{{ old('amount') ?? $expenditure->amount }}"type="number" name="amount" id="amount">
                <div class="text-red-700 ">
                    @error('amount')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Remarks</label>
                <input class="w-full border border-gray-200" value="{{ old('reamrks') ?? $expenditure->remarks }}"
                    type="text" name="remarks" id="remarks">
                <div class="text-red-700 ">
                    @error('remarks')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Date</label>
                <input class="w-full border border-gray-200" value="{{ old('date') ?? $expenditure->date }}" type="date"
                    name="date" id="date">
                <div class="text-red-700 ">
                    @error('date')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <Button class="p-2 px-4 text-white bg-indigo-600 rounded-xl">Update</Button>
            </div>
        </form>
    </div>
@endsection
