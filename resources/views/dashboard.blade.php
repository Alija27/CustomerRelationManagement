@extends('layouts.app')
@section('main')
    <div>



        @if (session('message'))
            {{ session('message') }}
        @endif
        <div class="flex ">
            <div class="w-full">

                <div class="justify-between my-6 lg:flex">
                    <div class="mx-6 text-2xl font-bold ">Dashboard</div>
                    <div class="flex mx-6 mt-6 lg:mt-0">
                        {{-- <form method="post" action={{route("attendences.store")}}> --}}
                        @csrf
                        <button onclick="show()" @if (App\Models\Attendence::whereDate('date', Carbon\Carbon::today())->where('user_id', auth()->user()->id)->first()) disabled @endif
                            class="p-2 px-6 mr-2 text-white bg-green-600 rounded hover:bg-green-700 "><i
                                class="fa-solid fa-stopwatch"></i><i class="m-1 fa-solid fa-arrow-right"></i>Clock In</button>
                        {{-- </form> --}}
                        <button onclick="out()" class="p-2 px-6 ml-2 text-white bg-red-600 rounded hover:bg-red-700"><i
                                class="fa-solid fa-arrow-left"><i class="m-1 fa-solid fa-stopwatch"></i></i>Clock
                            Out</button>
                        <a href="{{ route('leaves.create') }}">
                            <button class="p-2 px-6 ml-2 text-white bg-yellow-600 rounded hover:bg-yellow-700"><i
                                    class="m-1 fa-solid fa-envelope"></i>Ask
                                Leave</button>
                        </a>


                    </div>
                </div>
                <div class="grid grid-cols-1 flex-wrap gap-6 lg:gap-4 md:grid-cols-2 lg:grid-cols-3{{-- justify-center gap-6 m-6 mt-6 lg:flex-nowrap sm:flex-row lg:w-8/12 lg:justify-start lg:gap-4 --}}">
                    {{-- <div class="text-2xl text-blue-600">
                        Welcome to dashboard
                    </div> --}}


                    <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                class="fa-solid fa-clipboard-user"></i></span>
                        <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm">Total Attendence</div>
                            <div class="text-sm text-gray-600">{{ $attendences }}</div>
                        </div>
                    </div>
                    <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                class="fa-regular fa-envelope"></i></span>
                        <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm">Total Leave</div>
                            <div class="text-sm text-gray-600">{{ $leaves }}</div>
                        </div>
                    </div>
                    <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                class="fa-regular fa-clipboard"></i></span>
                        <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm ">This month attednednce</div>
                            <div class="text-sm text-gray-600">{{ $this_month_attendence }}</div>
                        </div>
                    </div>
                    <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                class="fa-solid fa-cake-candles"></i></span>
                        <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm ">Upcomming Client birthdays</div>
                            <div class="text-sm text-gray-600">{{ $client_birthday_total }}</div>
                        </div>
                    </div>
                    <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                class="fa-solid fa-cake-candles"></i></span>
                        <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm ">Upcomming User birthdays</div>
                            <div class="text-sm text-gray-600">{{ $user_birthday_total }}</div>
                        </div>
                    </div>

                    <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                class="fa-solid fa-ticket"></i></span>
                        <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm ">Todays Ticket</div>
                            <div class="text-sm text-gray-600">{{ $today_ticket }}</div>
                        </div>
                    </div>
                    <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                class="fa-solid fa-ticket-simple"></i></span>
                        <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm ">Upcomming Ticket</div>
                            <div class="text-sm text-gray-600">{{ $upcomming_ticket }}</div>
                        </div>
                    </div>
                    <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                class="fa-solid fa-money-check-dollar"></i></span>
                        <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm ">Todays Income</div>
                            <div class="text-sm text-gray-600">Rs {{ $today_income }}</div>
                        </div>
                    </div>
                    <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                class="fa-solid fa-coins"></i></span>
                        <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm ">Todays Expenditure</div>
                            <div class="text-sm text-gray-600">Rs {{ $today_expenditure }}</div>
                        </div>
                    </div>
                </div>
                <div class="flex gap-8 mt-4">
                    <div class="flex flex-col w-1/2 border border-gray-300 dashboard-card">
                        <div class="p-3 text-white bg-indigo-600 text-bold">
                            Upcoming User Birthday
                        </div>
                        <div class="flex flex-col  max-h-[200px] overflow-y-scroll scrollbar">
                            @foreach ($u_birthday as $user)
                                <div class="p-3 border-b">
                                    <div class="flex justify-between ">
                                        <div class="text-xl font-semibold">{{ $user->name }}</div>
                                        <div>

                                            {!! $user->remaining === 0
                                                ? 'Today <i class="fa-solid fa-cake-candles"></i>'
                                                : $user->remaining . ' ' . 'days remaining' !!}
                                        </div>
                                    </div>
                                    <div class="flex flex-row gap-8">
                                        <div>{{ Carbon\Carbon::parse($user->dob)->format('M-d') }}</div>
                                        <div>{{ $user->phonenumber }}</div>
                                    </div>
                                    <div>{{ $user->address }}</div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="flex flex-col w-1/2 border border-gray-300 dashboard-card">
                        <div class="p-3 text-white bg-indigo-600 text-bold">
                            Upcoming Client Birthday
                        </div>
                        <div class="flex flex-col  max-h-[200px] overflow-y-scroll scrollbar">
                            @foreach ($c_birthday as $client)
                                <div class="p-3 border-b">
                                    <div class="flex justify-between ">
                                        <div class="text-xl font-semibold">{{ $client->name }}</div>
                                        <div>
                                            {!! $client->remaining === 0
                                                ? 'Today <i class="fa-solid fa-cake-candles"></i>'
                                                : $client->remaining . ' ' . 'days remaining' !!}
                                        </div>
                                    </div>
                                    <div class="flex flex-row gap-8">
                                        <div>{{ Carbon\Carbon::parse($user->dob)->format('M-d') }}</div>
                                        <div>{{ $client->phonenumber }}</div>
                                    </div>
                                    <div>{{ $client->address }}</div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>


        </div>

        <div id="ri" class="fixed top-0 bottom-0 left-0 right-0 hidden bg-black bg-opacity-10 backdrop-blur-lg">
            <div class="flex items-center justify-center">
                <div class="px-10 py-6 font-bold bg-white rounded-lg shadow-lg mt-[15%]">
                    <div class="flex justify-between">

                        <span></span>
                        <i onclick="cihide()" class="mb-6 cursor-pointer fa-solid fa-circle-xmark"></i>
                    </div>
                    <div class="font-bold text-center">
                        Remarks
                    </div>

                    <form action="{{ route('attendences.store') }}" method="post">
                        @csrf
                        <div class="flex flex-col mt-4 ">
                            <textarea class="border-gray-800 rounded border-1" name="reason" id="reason"></textarea>
                            <button class="p-2 mt-1 text-white bg-green-600 rounded-md">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @if ($attendence)
            <div id="cout"
                class="fixed top-0 bottom-0 left-0 right-0 hidden bg-black bg-opacity-10 backdrop-blur-lg">
                <div class="flex items-center justify-center">
                    <div class="px-10 py-6 font-bold bg-white rounded-lg shadow-lg mt-[15%]">
                        <div class="flex justify-between">

                            <span></span>
                            <i onclick="hide()" class="mb-4 cursor-pointer fa-solid fa-circle-xmark"></i>
                        </div>
                        <div class="font-bold text-center">
                            Remarks
                        </div>

                        <form action="{{ route('attendences.update', $attendence->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="flex flex-col mt-4 ">
                                <textarea class="border-gray-800 rounded border-1" name="reason" id="reason"></textarea>
                                <button type="submit" class="p-2 mt-2 text-white bg-green-600 rounded-md">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endsection
    @section('js')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


        <script>
            function show() {
                $("#ri").removeClass("hidden");
            }

            function out() {
                $("#cout").removeClass("hidden");
            }

            function cihide() {
                $("#ri").addClass("hidden");
            }

            function hide() {
                $("#cout").addClass("hidden");
            }
        </script>
    @endsection
