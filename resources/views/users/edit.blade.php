@extends('layouts.app')
@section('main')

<div>
    <form class="w-8/12 p-6 m-6 bg-white rounded-md shadow-md" method="POST" action={{route('users.update',$user)}}>
        @method("PUT")
        @csrf
        @if ($errors->any())
            {{$errors}}
        @endif
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Name</label>
            <input  class="w-11/12 border border-gray-200" type="text" name="name" id="name" value={{$user->name}}>
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Email</label>
            <input  class="w-11/12 border border-gray-200" type="text" name="email" id="email" value="{{$user->email}}">
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Address</label>
            <input  class="w-11/12 border border-gray-200" type="text" name="address" id="address" value="{{$user->address}}">
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Phonenumber</label>
            <input  class="w-11/12 border border-gray-200" type="number" name="phonenumber" id="phonenumber"value="{{$user->phonenumber}}">
        </div>
        <div class="mb-6">
        
            
            <label class="block font-bold text-gray-600 text-md">Role</label>
            <select class="w-11/12 border border-gray-200" name="role" id="role">
               {{--  @foreach(\App\Models\User::CRUD_ROLES as $role)
               <option value="{{$role}}" @if($user->role == $role) selected @endif> {{$role}} </option>
               @endforeach --}}
               <option value="admin" @if($user->role == "admin") selected @endif> Admin </option>
               <option value="customer" @if($user->role == "customer") selected @endif> Customer </option>

            </select>
            
{{--             <input  class="w-11/12 border border-gray-200" type="text" name="role" id="role" value="{{$user->role}}">
 --}}           
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Date Of Birth</label>
            <input  class="w-11/12 border border-gray-200" type="date" name="dob" id="dob" value={{$user->dob}}>
        </div>
        <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Bloodgroup</label>
            <input  class="w-11/12 border border-gray-200" type="text" name="bloodgroup" id="bloodgroup" value={{$user->bloodgroup}}>
        </div>
        
        
        <div class="mb-6">
        
            
            <label class="block font-bold text-gray-600 text-md">Post</label>
            
            
            <input  class="w-11/12 border border-gray-200" type="text" name="post" id="post" value="{{$user->post}}">
           
        </div>
        
        <div class="mb-6">
            <Button class="p-2 text-white bg-indigo-600 rounded-xl">Update</Button>
        </div>
      
    </form>
</div>
@endsection