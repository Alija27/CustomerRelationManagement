@extends("layouts.app")
@section("main")
<div class="flex flex-wrap gap-6 lg:gap-4 lg:flex-nowrap mx-6{{-- justify-center gap-6 m-6 mt-6 lg:flex-nowrap sm:flex-row lg:w-8/12 lg:justify-start lg:gap-4 --}}">
    {{--  <div class="text-2xl text-blue-600">
        Welcome to dashboard
     </div>  --}}
     
         
  <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-5/12 lg:w-1/4 ">
      <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i class="fa-solid fa-eye"></i></span>
      <div class="mx-4 mt-4 ">
      <div class="antialiased font-bold text-gray-600 md:text-sm">Profile_Views</div>
      <div class="text-sm text-gray-600">16</div>
      </div>
  </div>
  <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-5/12 lg:w-1/4 ">
      <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i class="fa-solid fa-eye"></i></span>
      <div class="mx-4 mt-4 ">
      <div class="antialiased font-bold text-gray-600 md:text-sm">Followers</div>
      <div class="text-sm text-gray-600">16</div>
      </div>
  </div>
  <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-5/12 lg:w-1/4 ">
      <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i class="fa-solid fa-eye"></i></span>
      <div class="mx-4 mt-4 ">
      <div class="antialiased font-bold text-gray-600 md:text-sm ">Profile_Views</div>
      <div class="text-sm text-gray-600">16</div>
      </div>
  </div>
  <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-5/12 lg:w-1/4 ">
      <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i class="fa-solid fa-eye"></i></span>
      <div class="mx-4 mt-4 ">
      <div class="antialiased font-bold text-gray-600 md:text-sm ">View</div>
      <div class="text-sm text-gray-600">16</div>
      </div>
  </div>
  @endsection
