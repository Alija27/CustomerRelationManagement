@extends('layouts.app')
@section('main')<div>
    <div class="w-8/12 p-6 m-6 bg-white rounded-md shadow-md">
        
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Name</label>
            <input class="w-11/12 bg-gray-200 border border-gray-200" type="text" name="name" id="name" disabled value={{$user->name}}>
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Email</label>
            <input  class="w-11/12 bg-gray-200 border border-gray-200 bg-ray-200" type="text" name="email" id="email" disabled value="{{$user->email}}">
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Address</label>
            <input  class="w-11/12 bg-gray-200 border border-gray-200" type="text" name="address" id="address" disabled value="{{$user->address}}">
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Phonenumber</label>
            <input  class="w-11/12 bg-gray-200 border border-gray-200" type="number" name="phonenumber" id="phonenumber" disabled value="{{$user->phonenumber}}">
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Role</label>
            <input  class="w-11/12 bg-gray-200 border border-gray-200" type="text" name="role" id="role"  disabled value="{{$user->role}}">
        </div>
        
        <div class="mb-6">
            <Button class="p-2 text-white bg-indigo-600 rounded-xl"></Button>
        </div>
    </div>
    
</div>
@endsection