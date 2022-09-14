@extends('layouts.app')
@section('css')
<link rel="stylesheet"href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<style>
    body{
        overflow: hidden;
    }
    .dataTables_length select{
        width: 4em;
        height: 2em;
    }
    .dataTables_filter{
        margin-bottom: 1em
    }
    .dataTables_filter input{
        height: 2em
    }
    .dataTables_wrapper{
        margin: 0 20px
    }
</style>
@endsection


@section('main')
@if (session('message'))
    {{session('message')}}
@endif
      <div  class="w-full overflow-auto bg-white border border-gray-200 shadow-md">
          <div class="flex justify-between mb-6 border-b border-gray-200">
              <span class="m-1 mx-4 my-4 text-2xl font-bold">leaves</span>
             
              <a href="{{route('leaves.create')}}">
              <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
               Ask Leave
              </button>
              </a>
             
          </div>
          <table class="max-w-full mx-5 my-5 display" id="myTable">
              <thead class="border-b">
              <tr  class="bg-indigo-600 ">
                  <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                      
                  </th>
                  <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                    Name
                </th>
                  
                  <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                      Date
                  </th>
                  <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                      Subject
                </th>
                <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                    Status
               </th>
                 <th sope="col" class="px-6 py-4 text-sm font-medium text-white">
                     Action
                </th>
              </tr>
            </thead>
            <tbody>
          @foreach($leaves as $leave)
       {{--  @if(auth()->user()->role != "admin")
        <tr class="border-b">
            <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                
            </td>
            <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                {{$userleave->date}}
            </td>
            <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                {{$userleave->subject}}
            </td>
            <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                    <form method="put" action="{{route('leaves.update', $userLeave->id)}}" >
                        <select>
                            <option  value="pending">Pending</option>
                            <option  value="approved">Approve</option>
                            <option  value="cancled">Cancel</option>
                        </select>
                    </form>
                 </td>
            </td>
            <td class="text-sm font-medium whitespace-nowrap">
                <a href="{{route('leaves.edit',$leave)}}"> <span class="p-1 px-2 mr-2 text-white bg-blue-800 rounded">   <i class="fa-solid fa-pen-to-square"></i> </span></a>
                <a href="{{route('leaves.show', $leave->id)}}" ><span  class="p-1 px-2 mr-2 text-white bg-green-800 rounded cursor-pointer">  <i class="fa-solid fa-eye"></i></span></a> 
            </td>

        </tr>
        @else  --}}
          <tr class="border-b {{-- even:bg-gray-100 odd:bg-gray-200 --}}">
            <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
               {{$loop->index + 1}}
              </td>
              <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                {{$leave->user->name}}
              </td>
              <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
            {{$leave->date}}
            </td>
            <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
            {{$leave->subject}}
            </td>
           
            <td class="text-sm font-medium text-gray-900 whitespace-nowrap">
                <form method="post" action={{route("leaves.update", $leave->id)}}>
                    @csrf
                    @method("PUT")
                    <select id="status{{$leave->id}}" class="rounded" data-id="{{$leave->id}}"  name="status">
                        <option value="pending" @if ($leave->status == "pending") selected @endif >Pending</option>
                        @if(auth()->user()->role === "admin") <option  value="approved"  @if ($leave->status == "approved") selected @endif >Approve</option>  @endif
                        <option value="canceled"  @if ($leave->status == "canceled") selected @endif >Cancel</option>
                    </select>
                    <input type="hidden" name="subject" value="{{$leave->subject}}">
                </form>
            </td>
           
            <td class="text-sm font-medium whitespace-nowrap">
                <a href="{{route('leaves.edit',$leave)}}"> <span class="p-1 px-2 mr-2 text-white bg-blue-800 rounded">   <i class="fa-solid fa-pen-to-square"></i> </span></a>
                <a href="{{route('leaves.show', $leave->id)}}" ><span  class="p-1 px-2 mr-2 text-white bg-green-800 rounded cursor-pointer">  <i class="fa-solid fa-eye"></i></span></a> 
            </td>

        </tr>
       
          @endforeach
    </tbody>

        </table>
     

</div>



@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    
<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js">

</script>
    <script>
        $(document).ready( function () { 
            $('#myTable').DataTable();

            // $('#status').on('change', function(){
            //     var id = $("#status").attr("data-id");
            //     $("#btnSubmit"+id).click();
            // })
        } );
        
       

       
    </script>
@endsection