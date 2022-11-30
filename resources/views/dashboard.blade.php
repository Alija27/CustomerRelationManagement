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
                        @if (Carbon\Carbon::parse(Auth::user()->entry_time)->format('H:i') < Carbon\Carbon::now()->format('H:i'))
                            <button onclick="show()"
                                @if ($attendence?->clock_in !== null) disabled title="At {{ $attendence?->clock_in }}" @endif
                                class="p-2 px-6 mr-2 text-white bg-green-600 rounded hover:bg-green-700 @if ($attendence?->clock_in !== null) cursor-not-allowed @endif"><i
                                    class="fa-solid fa-stopwatch"></i><i
                                    class="m-1 fa-solid fa-arrow-right"></i>{{ $attendence?->clock_in ? 'Clocked In' : 'Clock In' }}</button>
                        @else
                            <form action="{{ route('attendences.store') }}" method="POST">
                                @csrf
                                <button
                                    @if ($attendence?->clock_in !== null) disabled  title="At {{ $attendence?->clock_in }}" @endif
                                    class="p-2 px-6 mr-2 text-white bg-green-600 rounded hover:bg-green-700 @if ($attendence?->clock_in !== null) cursor-not-allowed @endif"><i
                                        class="fa-solid fa-stopwatch"></i><i
                                        class="m-1 fa-solid fa-arrow-right"></i>{{ $attendence?->clock_in ? 'Clocked In' : 'Clock In' }}</button>
                            </form>
                        @endif
                        {{-- </form> --}}
                        {{-- @if (App\Models\Attendence::where('user_id', auth()->user()->id)->where('date', Carbon\Carbon::now())->count() > 0) --}}
                        @if (Auth::user()->exit_time > Carbon\Carbon::now()->format('H:i:s'))
                            <button onclick="out()"
                                @if ($attendence?->clock_out !== null || $attendence?->clock_in == null) disabled  @if ($attendence?->clock_in != null) title="At {{ $attendence?->clock_out }}" @endif
                                @endif
                                class="p-2 px-6 ml-2 text-white bg-red-600 rounded hover:bg-red-700 @if ($attendence?->clock_out !== null || $attendence?->clock_in == null) cursor-not-allowed @endif"><i
                                    class="fa-solid fa-arrow-left"><i
                                        class="m-1 fa-solid fa-stopwatch"></i></i>{{ $attendence?->clock_out ? 'Clocked Out' : 'Clock Out' }}</button>
                        @else
                            @if ($attendence)
                                <form action="{{ route('attendences.update', $attendence?->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button
                                        @if ($attendence?->clock_out !== null || $attendence?->clock_in == null) disabled  @if ($attendence?->clock_in != null) title="At {{ $attendence?->clock_out }}" @endif
                                        @endif
                                        class="@if ($attendence?->clock_out !== null || $attendence?->clock_in == null) cursor-not-allowed @endif p-2 px-6 ml-2 text-white bg-red-600 rounded hover:bg-red-700 "><i
                                            class="fa-solid fa-arrow-left"><i
                                                class="m-1 fa-solid fa-stopwatch"></i></i>{{ $attendence?->clock_out ? 'Clocked Out' : 'Clock Out' }}</button>
                                </form>
                            @else
                                <button
                                    @if ($attendence?->clock_out !== null || $attendence?->clock_in == null) disabled  @if ($attendence?->clock_in != null) title="At {{ $attendence?->clock_out }}" @endif
                                    @endif
                                    class="@if ($attendence?->clock_out !== null || $attendence?->clock_in == null) cursor-not-allowed @endif p-2 px-6 ml-2 text-white bg-red-600 rounded hover:bg-red-700 "><i
                                        class="fa-solid fa-arrow-left"><i
                                            class="m-1 fa-solid fa-stopwatch"></i></i>{{ $attendence?->clock_out ? 'Clocked Out' : 'Clock Out' }}</button>
                            @endif
                            {{-- @else
                            <button
                            class="p-2 px-6 ml-2 text-white bg-red-600 rounded cursor-not-allowed hover:bg-red-700"
                            @if (App\Models\Attendence::whereDate('date', Carbon\Carbon::today())->where('user_id', auth()->user()->id)->where('clock_out', '!=', 'null')->first()) disabled @endif><i class="fa-solid fa-arrow-left"><i
                                class="m-1 fa-solid fa-stopwatch"></i></i>Clock
                                Out</button>
                                @endif --}}
                        @endif
                        {{-- @endif --}}
                        @if (auth()->user()->role != 'admin')
                            <a href="{{ route('leaves.create') }}">
                                <button class="p-2 px-6 ml-2 text-white bg-yellow-600 rounded hover:bg-yellow-700"><i
                                        class="m-1 fa-solid fa-envelope"></i>Ask
                                    Leave</button>
                            </a>

                        @endif
                    </div>
                </div>
                <div class="grid grid-cols-1 flex-wrap gap-6 lg:gap-4 md:grid-cols-2 lg:grid-cols-3{{-- justify-center gap-6 m-6 mt-6 lg:flex-nowrap sm:flex-row lg:w-8/12 lg:justify-start lg:gap-4 --}}">
                    {{-- <div class="text-2xl text-blue-600">
                        Welcome to dashboard
                    </div> --}}


                    {{-- <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                class="fa-solid fa-clipboard-user"></i></span>
                        <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm">Total Attendence</div>
                            <div class="text-sm text-gray-600">{{ $attendences }}</div>
                        </div>
                    </div> --}}
                    @if (auth()->user()->role == 'user' || auth()->user()->role == 'desk')
                        <div
                            class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                            <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                    class="fa-regular fa-envelope"></i></span>
                            <div class="mx-4 mt-4 ">
                                <div class="antialiased font-bold text-gray-600 md:text-sm">Total Leave</div>
                                <div class="text-sm text-gray-600">{{ $leaves }}</div>
                            </div>
                        </div>
                    @endif
                    @role('admin')
                        <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                            <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                    class="fa-solid fa-clipboard-user"></i></span>
                            <div class="mx-4 mt-4 ">
                                <div class="antialiased font-bold text-gray-600 md:text-sm">Today Leaves</div>
                                <div class="text-sm text-gray-600"> {{ $today_leaves }}</div>
                            </div>
                        </div>
                    @endrole
                    <a href="{{ route('attendences.monthly') }}">
                        <div
                            class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                            <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                    class="fa-regular fa-clipboard"></i></span>
                            <div class="mx-4 mt-4 ">
                                <div class="antialiased font-bold text-gray-600 md:text-sm ">This month attednednce
                                </div>
                                <div class="text-sm text-gray-600">{{ $this_month_attendence }}</div>
                            </div>
                        </div>
                    </a>
                    <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                class="fa-solid fa-cake-candles"></i></span>
                        <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm ">Upcomming Client birthdays
                            </div>
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
                    <a href="{{ route('ticket.today') }}">
                    <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                class="fa-solid fa-ticket"></i></span>
                        <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm ">Todays Ticket</div>
                            <div class="text-sm text-gray-600">{{ $today_ticket }}</div>
                        </div>
                    </div>
                </a>
                    <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                        <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                class="fa-solid fa-ticket-simple"></i></span>
                        <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm ">Upcomming Ticket</div>
                            <div class="text-sm text-gray-600">{{ $upcomming_ticket }}</div>
                        </div>
                    </div>
                    @if (auth()->user()->role == 'admin' && auth()->user()->role == 'desk')
                        <div
                            class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                            <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                    class="fa-solid fa-money-check-dollar"></i></span>
                            <div class="mx-4 mt-4 ">
                                <div class="antialiased font-bold text-gray-600 md:text-sm ">Todays Income</div>
                                <div class="text-sm text-gray-600">Rs {{ $today_income }}</div>
                            </div>
                        </div>
                        <div
                            class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-full lg:w-full ">
                            <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i
                                    class="fa-solid fa-coins"></i></span>
                            <div class="mx-4 mt-4 ">
                                <div class="antialiased font-bold text-gray-600 md:text-sm ">Todays Expenditure</div>
                                <div class="text-sm text-gray-600">Rs {{ $today_expenditure }}</div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="flex flex-wrap mt-4 gap-y-8 gap-x-2">
                    <div class="flex flex-col w-[49%] border border-gray-300 dashboard-card">
                        <div class="p-3 text-white bg-indigo-600 text-bold">
                            Upcoming User Birthday
                        </div>
                        @if (!count($u_birthday))
                            <div class="grid h-full font-bold place-items-center">
                                <span>
                                    No Upcomming Birthdays.
                                </span>
                            </div>
                        @endif
                        <div class="flex flex-col  max-h-[200px] overflow-y-scroll scrollbar">
                            @foreach ($u_birthday as $user)
                                <a href="{{ route('users.show', $user) }}">
                                    <div class="p-3 border-b">
                                        <div class="flex justify-between ">
                                            <div class="flex flex-row gap-2">
                                                <img class="w-12 h-12 rounded-full"
                                                    src="https://dummyimage.com/400x400/{{ substr(md5(rand()), 0, 6) }}/fff.png&text={{ substr($user->name, 0, 1) }}"
                                                    alt="user avatar">
                                                <div>
                                                    <div class="text-xl font-semibold ">{{ $user->name }}</div>
                                                    <div>{{ Carbon\Carbon::parse($user->dob)->format('M d') }}</div>
                                                </div>
                                            </div>
                                            <div>
                                                <div>
                                                    {!! $user->remaining === 0
                                                        ? 'Today <i class="fa-solid fa-cake-candles"></i>'
                                                        : $user->remaining . ' ' . 'days remaining' !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>
                    <div class="flex flex-col w-[49%] border border-gray-300 dashboard-card">
                        <div class="p-3 text-white bg-indigo-600 text-bold">
                            Upcoming Client Birthday
                        </div>
                        @if (!count($c_birthday))
                            <div class="grid h-full font-bold place-items-center">
                                <span>
                                    No Upcomming Birthdays.
                                </span>
                            </div>
                        @endif
                        <div class="flex flex-col  max-h-[200px] overflow-y-scroll scrollbar">
                            @foreach ($c_birthday as $user)
                                <a href="{{ route('clients.show', $user) }}">
                                    <div class="p-3 border-b">
                                        <div class="flex justify-between ">
                                            <div class="flex flex-row gap-2">
                                                <img class="w-12 h-12 rounded-full"
                                                    src="https://dummyimage.com/400x400/{{ substr(md5(rand()), 0, 6) }}/fff.png&text={{ substr($user->name, 0, 1) }}"
                                                    alt="user avatar">
                                                <div>
                                                    <div class="text-xl font-semibold ">{{ $user->name }}</div>
                                                    <div>{{ Carbon\Carbon::parse($user->dob)->format('M d') }}</div>
                                                </div>
                                            </div>
                                            <div>
                                                <div>
                                                    {!! $user->remaining === 0
                                                        ? 'Today <i class="fa-solid fa-cake-candles"></i>'
                                                        : $user->remaining . ' ' . 'days remaining' !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                    @if (auth()->user()->role != 'user')
                        <div class="flex flex-col w-[49%] border border-gray-300 dashboard-card">
                            <div class="p-3 text-white bg-indigo-600 text-bold">
                                Last 7 Days Income and Expenditure Report
                            </div>
                            <div class="flex flex-col overflow-y-scroll scrollbar">
                                <div id="last7daysincomeexpenditure"></div>
                            </div>
                        </div>
                    @endif
                    <div class="flex flex-col w-[49%] border border-gray-300 dashboard-card">
                        <div class="p-3 text-white bg-indigo-600 text-bold">
                            Your Task Status Report
                        </div>
                        <div class="flex flex-col overflow-y-scroll scrollbar">
                            <div id="taskstatuspiechart"></div>
                        </div>
                    </div>
                    <div class="flex flex-col w-[49%] border border-gray-300 dashboard-card">
                        <div class="p-3 text-white bg-indigo-600 text-bold">
                            Your Attendence Monthly Report
                        </div>
                        <div class="flex flex-col overflow-y-scroll scrollbar">
                            <div id="reportattedence"></div>
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

                        <form action="{{ route('attendences.update', $attendence?->id) }}" method="POST">
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
        <script src="https://code.highcharts.com/highcharts.js"></script>


        {{-- Ajax for clocke out --}}
        <script>
            // function clockedout() {
            //     alert('i am out of here');
            //     $("#clockedout").submit(function(e) {

            //         e.preventDefault(); // avoid to execute the actual submit of the form.

            //         if ()
            //             $.ajax({
            //                 type: "PUT",
            //                 url: 'attendence/update/1',
            //                 data: {
            //                     ''
            //                 }, // serializes the form's elements.
            //                 success: function(data) {
            //                     alert(data); // show response from the php script.
            //                 }
            //             });

            //     });
            // }
        </script>

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

            var incomeexp = <?= json_encode($finalIncomeExpenditureReport) ?>;
            console.log(incomeexp);
            @if (auth()->user()->role != 'user')
                Highcharts.chart('last7daysincomeexpenditure', {
                    title: {
                        text: 'Income and Expenditure, Last 7 Days',
                    },
                    xAxis: {
                        categories: incomeexp.days
                    },
                    yAxis: {
                        title: {
                            text: 'Income and expenditure'
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'middle'
                    },
                    plotOptions: {
                        series: {
                            allowPointSelect: true
                        }
                    },
                    series: [{
                            name: 'Income',
                            data: incomeexp.incomes
                        },
                        {
                            name: 'Expenditure',
                            data: incomeexp.expenditures
                        }
                    ],
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }
                });
            @endif

            Highcharts.chart('taskstatuspiechart', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Your tasks status report'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Task',
                    colorByPoint: true,
                    data: <?php echo $finalTaskReport; ?>
                }]
            });

            Highcharts.chart('reportattedence', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Monthly Attendence Report, ' + new Date().getFullYear()
                },
                xAxis: {
                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    crosshair: true,
                    title: {
                        useHTML: true,
                        text: 'Months'
                    }
                },
                yAxis: {
                    title: {
                        useHTML: true,
                        text: 'Number of days'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: "Days",
                    data: {{ $finalAttendenceReport }}
                }]
            });
        </script>
    @endsection
