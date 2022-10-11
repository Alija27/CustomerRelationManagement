@extends('layouts.app')
@section('main')
    <div class="">
        <div class="w-full overflow-auto bg-white border border-gray-200 shadow-md">
            <div class="flex justify-between border-b border-gray-200">
                <span class="mx-4 my-4 text-2xl font-bold">Leave</span>
                <a href="{{ route('admin.leaves') }}">
                    <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                        <i class="mr-2 fa-solid fa-arrow-left"></i> GoBack
                    </button>
                </a>
            </div>
            <div class="relative bg-black">
                <div class="absolute flex items-center justify-center w-full h-full text-white">
                    <div>
                        Subject : {{ $leave->subject }} <br>
                        Letter: {{ $leave->letter }} <br>

                        Remarks : {{ $leave->remarks }}<br>
                        Status:{{ $leave->status }} <br>
                    </div>
                </div>
                <img class="object-cover object-center w-full h-[400px] opacity-70 blur-sm"
                    src="https://img.freepik.com/free-vector/reading-letter-concept-illustration_114360-4441.jpg?w=740&t=st=1663672700~exp=1663673300~hmac=dce754189525b45920ecf2655250e8bdb635637a42b5ac0d1505f460d47c02d9"
                    alt="image">
            </div>
        </div>
    </div>
    </div>
@endsection
