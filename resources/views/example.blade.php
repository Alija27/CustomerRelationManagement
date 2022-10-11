@extends("layouts.app")
@section("main")
<div>
        
           
  
        @if(session("message"))
        {{session("message")}}
        @endif
        <div class="flex flex-col md:flex-row">
            <div class="lg:w-11/12">
                
                <div class="justify-between my-6 lg:flex">
                    <div class="mx-6 text-2xl font-bold ">Dashboard</div>
                    <div class="flex mx-6 mt-6 lg:mt-0">
                        {{-- <form method="post" action={{route("attendences.store")}}> --}}
                            @csrf
                            <button onclick="show()"  class="p-2 px-6 mr-2 text-white bg-indigo-600 rounded hover:bg-green-600 "><i class="fa-solid fa-stopwatch"></i><i class="m-1 fa-solid fa-arrow-right"></i>Clock In</button>
                        {{-- </form> --}}
                        <button onclick="out()" class="p-2 px-6 ml-2 text-white bg-indigo-600 rounded hover:bg-red-600"><i class="fa-solid fa-arrow-left"><i class="m-1 fa-solid fa-stopwatch"></i></i>Clock Out</button>
                    
                    </div>
                </div>
                <div class="flex flex-wrap gap-6  mx-6 justify-center{{-- justify-center gap-6 m-6 mt-6 lg:flex-nowrap sm:flex-row lg:w-8/12 lg:justify-start lg:gap-4 --}}">
                        {{--  <div class="text-2xl text-blue-600">
                        Welcome to dashboard
                    </div>  --}}
            
                
                            <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-5/12{{--  lg:w-1/4 --}} ">
                            <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i class="fa-solid fa-eye"></i></span>
                            <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-xs">Total Attendence</div>
                            <div class="text-sm text-gray-600">{{$attendences}}</div>
                            </div>
                            </div>
                        <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-5/12 {{-- lg:w-1/4 --}} ">
                            <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i class="fa-solid fa-eye"></i></span>
                            <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm">Total Leave</div>
                            <div class="text-sm text-gray-600">16</div>
                            </div>
                        </div>{{--  --}}
                        <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-5/12 {{-- lg:w-1/4 --}} ">
                            <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i class="fa-solid fa-eye"></i></span>
                            <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm ">Profile_Views</div>
                            <div class="text-sm text-gray-600">16</div>
                            </div>
                        </div>
                        <div class="flex w-11/12 h-20 p-2 bg-white border-red-100 rounded-md shadow-xl md:w-5/12 {{-- lg:w-1/4 --}} ">
                            <span class="items-center px-5 py-5 text-white bg-indigo-600 rounded-md"><i class="fa-solid fa-eye"></i></span>
                            <div class="mx-4 mt-4 ">
                            <div class="antialiased font-bold text-gray-600 md:text-sm ">View</div>
                            <div class="text-sm text-gray-600">16</div>
                            </div>
                        </div>
                </div>
            </div>
             <div class="w-3/12 h-screen border-l-2 border-gray-800 shadow-xl">
                 <div class="w-full h-[10%] border-b-2  border-gray-800 mx-2">
                    
                     AS
                </div>
             </div>

        </div>
<div id="ri" class="fixed top-0 bottom-0 left-0 right-0 hidden bg-black bg-opacity-10 backdrop-blur-lg">
    <div class="flex items-center justify-center">
        <div class="px-10 py-10 font-bold bg-white rounded-lg shadow-lg mt-[15%]">
            <div class="flex justify-between">
                
                <span></span>
                 <i onclick="cihide()" class="mb-6 cursor-pointer fa-solid fa-circle-xmark"></i>
                 </div>
            <div class="font-bold text-center">
                Remarks
            </div>
            
                <form action="{{route('attendences.store')}}" method="post">
                    @csrf
                    <div class="flex flex-col mt-8 space-x-5">
                    <textarea class="border-gray-800 rounded border-1" name="reason" id="reason"></textarea>
                    <button class="p-2 mt-1 text-white bg-green-600 rounded-md">Submit</button>
                    </div>
                </form>
        </div>
    </div>
</div>
@if($attendence)  
<div id="cout" class="fixed top-0 bottom-0 left-0 right-0 hidden bg-black bg-opacity-10 backdrop-blur-lg">
    <div class="flex items-center justify-center">
        <div class="px-10 py-10 font-bold bg-white rounded-lg shadow-lg mt-[15%]">
            <div class="flex justify-between">
                
           <span></span>
            <i onclick="hide()" class="mb-6 cursor-pointer fa-solid fa-circle-xmark"></i>
            </div>
            <div class="font-bold text-center">
                Remarks
            </div>
            
            <form action="{{route('attendences.update', $attendence->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="flex flex-col mt-8 space-x-5">
                <textarea class="border-gray-800 rounded border-1" name="reason" id="reason"></textarea>
                <button type="submit" class="p-2 mt-1 text-white bg-green-600 rounded-md">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endif

  @endsection
  @section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script>
    function show(){
        $("#ri").removeClass("hidden");
    }
    
    function out(){
        $("#cout").removeClass("hidden");
    }

    function cihide(){
        $("#ri").addClass("hidden");
    }

    function hide(){
        $("#cout").addClass("hidden");
    }
</script>
@endsection
