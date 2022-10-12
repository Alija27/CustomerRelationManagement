<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    @yield('css')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">

    {{-- @include('layouts.navigation') --}}
    <div class="flex">
        <nav class="fixed hidden h-screen bg-white shadow-lg hover:overflow-y-scroll main-sidebar lg:w-2/12 lg:block ">
            <div class="p-6 mx-6">
                <ul class="text-xl antialiased font-bold text-blue-500">
                    <li><i class="pr-2 fa-solid fa-user"></i>
                        Alija
                    </li>

                </ul>
            </div>
            <div class="px-2 ">
                <ul class="pl-2 antialiased font-bold text-md ">
                    <a href="{{ route('dashboard') }}">
                        <li
                            class="{{ request()->routeIs('dashboard') ? 'bg-indigo-600 text-white' : '' }} px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                            <i class="pr-2 fa-solid fa-gauge-high"></i>
                            Dashboard
                        </li>
                    </a>
                    <a href="{{ route('users.index') }}">
                        <li
                            class="px-2 py-2  {{ request()->routeIs('users*') ? 'bg-indigo-600 text-white' : '' }} rounded-md hover:bg-indigo-600 hover:text-white">
                            <i class="pr-2 fa-solid fa-users"></i>
                            Users
                        </li>
                    </a>
                    <a href="{{ route('clients.index') }}">
                        <li
                            class="px-2 py-2 my-2 {{ request()->routeIs('clients*') ? 'bg-indigo-600 text-white' : '' }} rounded-md hover:bg-indigo-600 hover:text-white">
                            <i class="pr-2 fa-solid fa-user-group"></i>
                            Clients
                        </li>
                    </a>
                    <a href="{{ route('departments.index') }}">
                        <li
                            class="px-2 py-2 my-2 rounded-md {{ request()->routeIs('departments*') ? 'bg-indigo-600 text-white' : '' }} hover:bg-indigo-600 hover:text-white">
                            <i class="pr-2 fa-solid fa-building"></i>
                            Departments
                        </li>
                    </a>
                    <a href="{{ route('airlines.index') }}">
                        <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                            <i class="pr-2 fa-solid fa-plane-departure"></i>
                            Airlines
                        </li>
                    </a>
                    <a href="{{ route('admin.attendence') }}">
                        <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                            <i class="pr-2 fa-regular fa-calendar-check"></i>
                            All Attendence
                        </li>
                    </a>
                    <a href="{{ route('attendences.index') }}">
                        <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                            <i class="pr-2 fa-solid fa-clipboard-user"></i>
                            My attendence
                        </li>
                    </a>
                    <div>

                        <li onclick="birthdayToggle()"
                            class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white                       {{ Route::is('birthday.users') || Route::is('birthday.clients') ? 'bg-indigo-600 text-white' : '' }}">
                            <i class="pr-2 fa-solid fa-cake-candles"></i>
                            Birthday <i class="ml-16 fa-solid fa-caret-down"></i>
                        </li>

                        <a href="{{ route('birthday.users') }}">
                            <li
                                class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white {{ Route::is('birthday.users') || Route::is('birthday.users') ? ' bg-indigo-200 ' : 'hidden' }}
                                birthday">
                                <i class="pr-2 fa-solid fa-gauge-high"></i>
                                User Birthday
                            </li>
                        </a>
                        <a href="{{ route('birthday.clients') }}">
                            <li
                                class="px-2 py-2   rounded-md hover:bg-indigo-600 hover:text-white {{ Route::is('birthday.clients') || Route::is('birthday.clients') ? 'bg-indigo-200' : 'hidden' }}
                                birthday">
                                <i class="pr-2 fa-solid fa-users"></i>
                                Client Birthday
                            </li>
                        </a>
                    </div>

                    <a href="{{ route('admin.leaves') }}">
                        <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                            <i class="pr-2 fa-solid fa-address-book"></i>
                            All Leave
                        </li>
                    </a>
                    <a href="{{ route('leaves.index') }}">
                        <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                            <i class="pr-2 fa-solid fa-envelope"></i>
                            My Leave
                        </li>
                    </a>
                    <a href="{{ route('purposes.index') }}">
                        <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                            <i class="pr-2 fa-solid fa-bars"></i>
                            Purpose
                        </li>
                    </a>
                    <a href="{{ route('tasks.index') }}">
                        <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                            <i class="pr-2 fa-solid fa-list-check"></i>
                            Tasks
                        </li>
                    </a>
                    <a href="{{ route('task.mytask') }}">
                        <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                            <i class="pr-2 fa-solid fa-briefcase"></i>
                            My Task
                        </li>
                    </a>
                    <a href="{{ route('incomes.index') }}">
                        <li
                            class="{{ request()->routeIs('incomes*') ? 'bg-indigo-600 text-white' : '' }} px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                            <i class="pr-2 fa-solid fa-money-check-dollar"></i>
                            Incomes
                        </li>
                    </a>
                    <a href="{{ route('expenditures.index') }}">
                        <li
                            class="{{ request()->routeIs('expenditures*') ? 'bg-indigo-600 text-white' : '' }} px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                            <i class="pr-2 fa-solid fa-coins"></i>Expenditures
                        </li>
                    </a>
                    <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <i class="pr-2 fa-solid fa-right-from-bracket"></i> <input type="submit" value="Logout">
                        </form>
                    </li>
                </ul>
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
        }
    </script>
</body>

</html>
