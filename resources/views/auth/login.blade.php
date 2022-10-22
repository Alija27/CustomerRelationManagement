<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased ">
    <div class="grid md:items-center bg-white md:h-screen ">
        <div
            class="grid md:grid-cols-2 md:gap-8  mx-auto  my-[20%] md:my-0 bg-gray-50 rounded-md md:w-9/12 w-8/12 border-2">
            <div class="my-auto grid items-center w-full px-8 py-8">

                <form class="w-full" method="POST" action="{{ route('login') }}">
                    <h1 class="text-2xl font-bold text-center">Welcome Back</h1>
                    <p class="text-xs font-semibold text-center text-gray-800">Please enter your detail</p>
                    @csrf
                    <div class="mt-6">

                        <label class="block mb-2">Email</label>
                        <input type="email" id="email" name="email"
                            class="w-full p-2 border-gray-200 rounded-xl @error('email')
                    
                 @enderror">
                        <span class="text-red-600">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </span>

                    </div>
                    <div class="my-3">
                        <label class="block mb-2">Password</label>
                        <input type="password" id="password" name="password"
                            class="w-full p-2 border-gray-200 rounded-xl{{-- @error('password') border-red-600 @enderror --}}">
                        {{-- <span class="text-red-600">
                        @error('password')
                       {{$message}}
                   @enderror --}}
                        </span>
                    </div>
                    <p class="my-2 text-sm font-bold text-right">Forgot Password</p>

                    <div class="my-3">
                        <button
                            class="w-full px-4 py-1 text-white bg-indigo-600 rounded-md shadow-md hover:shadow-lg hover:bg-indigo-800"
                            type="submit">Login</button>
                    </div>
            </div>
            <div class="hidden md:block shadow-md rounded-md border">
                <div>
                    <img src="https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-83.jpg?w=740&t=st=1662370387~exp=1662370987~hmac=03f4a45ff04c3e0bda1c0ddf531c0baa689cfadecde5743fdfffa5e05f3f1e71"
                        class="object-cover rounded-2xl ">
                </div>
            </div>
        </div>

    </div>
</body>

</html>
