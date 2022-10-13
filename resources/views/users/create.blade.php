@extends('layouts.app')
@section('main')
    <div class="top-0 w-full bg-white border border-gray-200 shadow-md ">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Create User</span>
            <a href="{{ route('users.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <i class="fa-solid fa-arrow-left"></i> Go Back </button>
            </a>

        </div>
        <form class="w-11/12 p-6 m-6 bg-white rounded-md" method="POST" action={{ route('users.store') }}>
            @csrf
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Name</label>
                <input class="w-full border border-gray-200 " type="text" name="name" id="name">
                <div class="text-red-700 ">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>

            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Email</label>
                <input class="w-full border border-gray-200" type="text" name="email" id="email">
                <div class="text-red-700 ">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Address</label>
                <input class="w-full border border-gray-200" type="text" name="address" id="address">
                <div class="text-red-700 ">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Phonenumber</label>
                <input class="w-full border border-gray-200" type="number" name="phonenumber" id="phonenumber">
                <div class="text-red-700 ">
                    @error('phonenumber')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Role</label>
                {{-- <input  class="w-full border border-gray-200" type="text" name="role" id="role"> --}}
                <select class="w-full border border-gray-200" name="role" id="role">
                    {{-- @foreach (\App\Models\User::CRUD_ROLES as $role)
               <option value="{{$role}}"> {{$role}} </option>
               @endforeach --}}
                    <option>Choose Role</option>
                    <option value="admin">Admin</option>
                    <option value="customer">Customer</option>
                </select>
                <div class="text-red-700 ">
                    @error('role')
                        {{ $message }}
                    @enderror
                </div>

            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Date Of Birth</label>
                <input class="w-full border border-gray-200" type="date" name="dob" id="dob">
                <div class="text-red-700 ">
                    @error('dob')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Bloodgroup</label>
                <input class="w-full border border-gray-200" type="text" name="bloodgroup" id="bloodgroup">
                <div class="text-red-700 ">
                    @error('bloodgroup')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Post</label>
                <input class="w-full border border-gray-200" type="text" name="post" id="post">
                <div class="text-red-700 ">
                    @error('post')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Entry Time</label>
                <input class="w-full border border-gray-200 " type="time" name="entry_time" id="entry_time">
                <div class="text-red-700 ">
                    @error('entry_time')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Exit Time</label>
                <input class="w-full border border-gray-200 " type="time" name="exit_time" id="exit_time">
                <div class="text-red-700 ">
                    @error('exit_time')
                        {{ $message }}
                    @enderror
                </div>
            </div>


            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Password</label>
                <input class="w-full border border-gray-200" type="password" name="password" id="password">
                <div class="text-red-700 ">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Confirmed Password</label>
                <input class="w-full border border-gray-200 " type="password" name="password_confirmation"
                    id="password_confirmation">
                <div class="text-red-700 ">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>

            </div>

            <div class="mb-6">
                <Button class="p-2 px-4 text-white bg-indigo-600 rounded-xl">Create</Button>
            </div>
        </form>
    </div>
@endsection
