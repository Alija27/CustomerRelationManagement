<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            <div class="flex">
                <nav class="hidden h-screen bg-white shadow-lg lg:w-2.8/12 lg:block">
                   <div class="p-6 mx-6">
                       <ul class="text-xl antialiased font-bold text-blue-500">
                           <li><i class="pr-2 fa-solid fa-user"></i>
                               Alija
                           </li>
                           
                       </ul>
                   </div>
                   <div class="px-6 py-2 mx-2">
                       <ul class="antialiased font-bold text-gray-600 text-md ">
                           <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                             <i class="pr-2 fa-solid fa-gauge-high"></i>
                            Dashboard
                           </li>
                          {{--  <a href="{{route('users.index')}}">
                            <li class="px-2 py-2 @if (Request::url('/users')) {{'bg-indigo-600 text-white'}} @endif rounded-md hover:bg-indigo-600 hover:text-white">
                                <i class="pr-2 fa-solid fa-square"></i>
                                  Users
                              </li>
                           </a> --}}
                           <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                             <i class="pr-2 fa-solid fa-box"></i>
                               Extra Components
                           </li>
                           <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                             <i class="pr-2 fa-solid fa-align-left"></i>
                               Layouts
                           </li>
                           <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                             <i class="pr-2 fa-brands fa-adversal"></i>
                               Form Elements
                           </li>
                           <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                             <i class="pr-2 fa-brands fa-creative-commons-nd"></i>
                               Form Layout
                           </li>
                           <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                             <i class="pr-2 fa-solid fa-address-book"></i>
                               Form Editor
                           </li>
                           <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                             <a href="/table"><i class="pr-2 fa-solid fa-table"></i>
                               Table
                             </a>
                           </li>
                           <li class="px-2 py-2 my-2 rounded-md hover:bg-indigo-600 hover:text-white">
                             <i class="pr-2 fa-solid fa-database"></i>
                               Database
                           </li>
                           
                       </ul>
                   </div>
                </nav>
                
               <div class="justify-center w-full mt-6 sm:flex-row lg:w-8/12 lg:justify-start ">
                 @yield('main')
               </div>
                    
                        
                
               
             </div> 
            </div> 
        </div>
    </body>
</html>
