<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Crm') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    @yield('css')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Style --}}
    <style>
        .main-sidebar::-webkit-scrollbar,
        .scrollbar::-webkit-scrollbar {
            width: 0.25em;
        }

        .main-sidebar::-webkit-scrollbar-track {}

        .main-sidebar::-webkit-scrollbar-thumb,
        .scrollbar::-webkit-scrollbar-thumb {
            background-color: rgb(219, 219, 219);
            border-radius: 50px;
        }
    </style>
</head>

<body class="font-sans antialiased">
    {{-- @include('layouts.navigation') --}}
    <div>
        <x-alert />
    </div>
    <div class="flex">
        <nav class="fixed hidden h-screen bg-white shadow-lg lg:w-2/12 lg:flex lg:flex-col">
            <div class="px-6 mx-6 h-[20vh]">

                <ul class="text-xl antialiased font-bold text-indigo-500">
                    <li class="my-4">
                        <i class="pr-2 fa-solid fa-calculator"></i> CRM
                    </li>
                    <li class="text-sm text-gray-500">
                        Welcome, {{ Auth::user()->name }}
                    </li>

                </ul>

            </div>
            <div class="px-2 h-[90vh] overflow-y-scroll main-sidebar border-b border-t">
                <ul class="pl-2 antialiased font-bold text-md ">
                    <a href="{{ route('dashboard') }}">
                        <li
                            class="{{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600 border-r-4 border-indigo-600' : '' }} px-2 py-2 my-2  hover:bg-indigo-50 hover:text-indigo-600 ">
                            <i class="pr-2 fa-solid fa-gauge-high"></i>
                            Dashboard
                        </li>
                    </a>
                    @role('admin')
                        <a href="{{ route('users.index') }}">
                            <li
                                class="px-2 py-2  {{ request()->routeIs('users*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}  hover:bg-indigo-50 hover:text-indigo-600">
                                <i class="pr-2 fa-solid fa-users"></i>
                                Users
                            </li>
                        </a>
                    @endrole
                    <a href="{{ route('clients.index') }}">
                        <li
                            class="px-2 py-2 my-2 {{ request()->routeIs('clients*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}  hover:bg-indigo-50 hover:text-indigo-600">
                            <i class="pr-2 fa-solid fa-user-group"></i>
                            Clients
                        </li>
                    </a>
                    @role('admin')
                        <a href="{{ route('departments.index') }}">
                            <li
                                class="px-2 py-2 my-2  {{ request()->routeIs('departments*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }} hover:bg-indigo-50 hover:text-indigo-600">
                                <i class="pr-2 fa-solid fa-building"></i>
                                Departments
                            </li>
                        </a>
                    @endrole
                    <a href="{{ route('airlines.index') }}">
                        <li
                            class="px-2 py-2  {{ request()->routeIs('airlines*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }} my-2 hover:bg-indigo-50 hover:text-indigo-600">
                            <i class="pr-2 fa-solid fa-plane-departure"></i>
                            Airlines
                        </li>
                    </a>
                    @role('admin')
                        <a href="{{ route('admin.attendence') }}">
                            <li
                                class="{{ request()->routeIs('admin.attendence*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}  px-2 py-2 my-2 hover:bg-indigo-50 hover:text-indigo-600">
                                <i class="pr-2 fa-regular fa-calendar-check"></i>
                                All Attendences
                            </li>
                        </a>
                    @endrole
                    <a href="{{ route('attendences.index') }}">
                        <li
                            class="{{ request()->routeIs('attendences*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }} px-2 py-2 my-2 hover:bg-indigo-50 hover:text-indigo-600">
                            <i class="pr-2 fa-solid fa-clipboard-user"></i>
                            My attendence
                        </li>
                    </a>
                    <div>

                        <li onclick="birthdayToggle()"
                            class="px-2 py-2 my-2  hover:bg-indigo-50 hover:text-indigo-600 {{ Route::is('birthday.*') ? 'bg-indigo-50 text-indigo-600 border-indigo-600' : '' }}">
                            <i class="pr-2 fa-solid fa-cake-candles"></i>
                            Birthday
                            <i
                                class="ml-16 fa-solid fa-caret-left left-icon {{ Route::is('birthday.*') ? 'hidden' : '' }}"></i>
                            <i
                                class="ml-16 fa-solid fa-caret-down down-icon {{ !Route::is('birthday.*') ? 'hidden' : '' }}"></i>
                        </li>
                        <div class="ml-8 bg-gray-200 {{ request()->routeIs('birthday.*') ? '' : 'hidden' }} birthday">
                            <a href="{{ route('birthday.users') }}">
                                <li
                                    class="px-2 py-2 my-2  hover:bg-indigo-50 hover:text-indigo-600 {{ Route::is('birthday.users') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}
                                    ">
                                    <i class="mr-1 fa-solid fa-cake-candles"></i>
                                    User Birthday
                                </li>
                            </a>
                            <a href="{{ route('birthday.clients') }}">
                                <li
                                    class="px-2 py-2  hover:bg-indigo-50 hover:text-indigo-600 {{ Route::is('birthday.clients') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}
                                    ">
                                    <i class="mr-1 fa-solid fa-cake-candles"></i>
                                    Client Birthday
                                </li>
                            </a>
                        </div>
                    </div>
                    @role('admin')
                        <a href="{{ route('admin.leaves') }}">
                            <li
                                class="{{ request()->routeIs('admin.leaves*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }} px-2 py-2 my-2 hover:bg-indigo-50 hover:text-indigo-600">
                                <i class="pr-2 fa-solid fa-address-book"></i>
                                All Leave
                            </li>
                        </a>
                    @endrole
                    @role('user')
                        <a href="{{ route('leaves.index') }}">
                            <li
                                class="{{ request()->routeIs('leaves*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }} px-2 py-2 my-2 hover:bg-indigo-50 hover:text-indigo-600">
                                <i class="pr-2 fa-solid fa-envelope"></i>
                                My Leave
                            </li>
                        </a>
                    @endrole
                    @role('admin')
                        <a href="{{ route('purposes.index') }}">
                            <li
                                class="{{ request()->routeIs('purposes*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }} px-2 py-2 my-2 hover:bg-indigo-50 hover:text-indigo-600">
                                <i class="pr-2 fa-solid fa-bars"></i>
                                Purpose
                            </li>
                        </a>
                    @endrole
                    <a href="{{ route('tasks.index') }}">
                        <li
                            class="{{ request()->routeIs('tasks*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }} px-2 py-2 my-2 hover:bg-indigo-50 hover:text-indigo-600">
                            <i class="pr-2 fa-solid fa-list-check"></i>
                            Tasks
                        </li>
                    </a>
                    @role('user')
                        <a href="{{ route('task.mytask') }}">
                            <li
                                class=" {{ request()->routeIs('task.mytask') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }} px-2 py-2 my-2 hover:bg-indigo-50 hover:text-indigo-600">
                                <i class="pr-2 fa-solid fa-briefcase"></i>
                                My Task
                            </li>
                        </a>
                    @endrole
                    @role('admin')
                        <a href="{{ route('incomes.index') }}">
                            <li
                                class="{{ request()->routeIs('incomes*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }} px-2 py-2 my-2  hover:bg-indigo-50 hover:text-indigo-600">
                                <i class="pr-2 fa-solid fa-money-check-dollar"></i>
                                Incomes
                            </li>
                        </a>
                    @endrole
                    @role('desk')
                        <a href="{{ route('incomes.index') }}">
                            <li
                                class="{{ request()->routeIs('incomes*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }} px-2 py-2 my-2  hover:bg-indigo-50 hover:text-indigo-600">
                                <i class="pr-2 fa-solid fa-money-check-dollar"></i>
                                Incomes
                            </li>
                        </a>
                    @endrole
                    @role('admin')
                        <a href="{{ route('expenditures.index') }}">
                            <li
                                class="{{ request()->routeIs('expenditures*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }} px-2 py-2 my-2  hover:bg-indigo-50 hover:text-indigo-600">
                                <i class="pr-2 fa-solid fa-coins"></i>Expenditures
                            </li>
                        </a>
                    @endrole
                    @role('desk')
                        <a href="{{ route('expenditures.index') }}">
                            <li
                                class="{{ request()->routeIs('expenditures*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }} px-2 py-2 my-2  hover:bg-indigo-50 hover:text-indigo-600">
                                <i class="pr-2 fa-solid fa-coins"></i>Expenditures
                            </li>
                        </a>
                    @endrole
                    <a href="{{ route('tickets.index') }}">
                        <li
                            class="{{ request()->routeIs('tickets*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }} px-2 py-2 my-2  hover:bg-indigo-50 hover:text-indigo-600">
                            <i class="mr-1 fa-solid fa-ticket"></i>
                            Tickets
                        </li>
                    </a>
                    @role('admin')
                    <a href="{{ route('admin.payments.index') }}">
                        <li
                            class="px-2 py-2  {{ request()->routeIs('admin.payments*') ? 'bg-indigo-50 text-indigo-600 border-r-4 border-indigo-600' : '' }}  hover:bg-indigo-50 hover:text-indigo-600">
                            <i class="pr-2 fa-solid fa-users"></i>
                            Payments
                        </li>
                    </a>
                @endrole
                </ul>
            </div>
            <div class="mx-auto h-[10vh]">
                <form action="{{ route('logout') }}" method="post">
                    <button
                        class="py-2 mx-auto my-2 text-white bg-indigo-500 rounded-md px-14 hover:bg-indigo-50 hover:text-indigo-600">
                        @csrf
                        <i class="pr-2 fa-solid fa-right-from-bracket"></i> <input type="submit" value="Logout">
                    </button>
                </form>
            </div>
        </nav>

        <div class="justify-center w-full mt-6 ml-6 mr-6 lg:ml-60 sm:flex-row ">
            @yield('main')
        </div>



    </div>
    </div>
    @yield('js')
    <script>
        function birthdayToggle() {
            $(".birthday").toggleClass("hidden");
            $('.down-icon').toggleClass('hidden');
            $('.left-icon').toggleClass('hidden');
        }
    </script>
</body>

</html>
