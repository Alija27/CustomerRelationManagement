@extends('layouts.app')
@section('main')
    <div class="top-0 w-full bg-white border border-gray-200 shadow-md ">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Leave</span>
            <a href="{{ route('leaves.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <i class="mr-2 fa-solid fa-arrow-left"></i> Go Back
                </button>
            </a>

        </div>
        <div class="p-6 m-6 ">

            <div class="mb-6">
                <label class="font-bold text-gray-600 text-md">Subject :</label>
                {{ $leave->subject }}
            </div>
            <div class="mb-6">
                <label class="font-bold text-gray-600 text-md">Letter :</label>
                {!! $leave->letter !!}
            </div>
            <div class="mb-6">
                <label class="font-bold text-gray-600 text-md">Remarks :</label>
                {{ $leave->remarks }}
            </div>
            <div class="mb-6">
                <label class="font-bold text-gray-600 text-md">Status :</label>
                {{ $leave->status }}
            </div>
            <div class="mb-6">
                <label class="font-bold text-gray-600 text-md">Submitted At :</label>
                {{ $leave->created_at }}
            </div>
            <div class="mb-6">
                <label class="font-bold text-gray-600 text-md">Image</label>
                <img src="/storage/{{ $leave->image }}" class="w-80 h-80">
            </div>




        </div>

    </div>
@endsection
