@extends('layouts.app')
@section('main')


    <div  class="w-full bg-white border border-gray-200 shadow-md">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Create User</span>
            <a href="{{route('users.index')}}">
            <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
           <- Go Back
            </button>
            </a>
            
        </div>
      <form class="w-11/12 p-6 m-6 overflow-auto bg-white rounded-md " method="POST" action={{route('users.store')}}>
        @csrf
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Name</label>
            <input  class="w-full border border-gray-200 " type="text" name="name" id="name">
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Email</label>
            <input  class="w-full border border-gray-200" type="text" name="email" id="email">
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Address</label>
            <input  class="w-full border border-gray-200" type="text" name="address" id="address">
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Phonenumber</label>
            <input  class="w-full border border-gray-200" type="number" name="phonenumber" id="phonenumber">
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Role</label>
           {{--  <input  class="w-full border border-gray-200" type="text" name="role" id="role"> --}}
           <select class="w-full border border-gray-200" name="role" id="role">
               {{--  @foreach(\App\Models\User::CRUD_ROLES as $role)
               <option value="{{$role}}"> {{$role}} </option>
               @endforeach --}}
               <option value="admin">Admin</option>
               <option value="customer">Customer</option>
            </select> 
            
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Date Of Birth</label>
            <input  class="w-full border border-gray-200" type="date" name="dob" id="dob">
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Bloodgroup</label>
            <input  class="w-full border border-gray-200" type="text" name="bloodgroup" id="bloodgroup">
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Post</label>
            <input  class="w-full border border-gray-200" type="text" name="post" id="post">
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Post</label>
            <input  class="w-full border border-gray-200" type="text" name="post" id="post">
            
            
        </div>
        
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Password</label>
            <input  class="w-full border border-gray-200" type="password" name="password" id="password">
        </div>
        <div class="mb-6">
            <Button class="p-2 px-4 text-white bg-indigo-600 rounded-xl">Create</Button>
        </div>
      </form>
</div>
@endsection