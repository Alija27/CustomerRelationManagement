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
                <input class="w-full border border-gray-200" value="{{ old('name') }}" type="text" name="name"
                    id="name">
                <div class="text-red-700 ">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>

            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Email</label>
                <input class="w-full border border-gray-200" value="{{ old('email') }}" type="text" name="email"
                    id="email">
                <div class="text-red-700 ">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Address</label>
                <input class="w-full border border-gray-200" value="{{ old('address') }}" type="text" name="address"
                    id="address">
                <div class="text-red-700 ">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Phonenumber</label>
                <input class="w-full border border-gray-200" value="{{ old('phonenumber') }}" type="number"
                    name="phonenumber" id="phonenumber">
                <div class="text-red-700 ">
                    @error('phonenumber')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Role</label>
                {{-- <input  class="w-full border border-gray-200" type="text" name="role" id="role"> --}}
                <select class="w-full border border-gray-200" value="{{ old('role') }}" name="role" id="role">
                    {{-- @foreach (\App\Models\User::CRUD_ROLES as $role)
               <option value="{{$role}}"> {{$role}} </option>
               @endforeach --}}
                    <option disabled selected>Choose Role</option>
                    <option value="admin" @if (old('role') == 'admin') selected @endif>Admin</option>
                    <option value="user" @if (old('role') == 'user') selected @endif>User</option>
                    <option value="desk" @if (old('role') == 'desk') selected @endif>Desk</option>
                </select>
                <div class="text-red-700 ">
                    @error('role')
                        {{ $message }}
                    @enderror
                </div>

            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Date Of Birth</label>
                <input class="w-full border border-gray-200" value="{{ old('date') }}" type="date" name="dob"
                    id="dob">
                <div class="text-red-700 ">
                    @error('dob')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Bloodgroup</label>
                <select class="w-full border border-gray-200" value="{{ old('bloodgroup') }}" type="text"
                    name="bloodgroup" id="bloodgroup">
                    <option disabled selected>Choose Blood Group</option>
                    <option value="A+" @if (old('bloodgroup') == 'A+') selected @endif>A+</option>
                    <option value="A-"@if (old('bloodgroup') == 'A-') selected @endif>A-</option>
                    <option value="B+"@if (old('bloodgroup') == 'B+') selected @endif>B+</option>
                    <option value="B-"@if (old('bloodgroup') == 'B-') selected @endif>B-</option>
                    <option value="O+"@if (old('bloodgroup') == 'O+') selected @endif>O+</option>
                    <option value="O-"@if (old('bloodgroup') == 'O-') selected @endif>O-</option>
                    <option value="AB+"@if (old('bloodgroup') == 'AB+') selected @endif>AB+</option>
                    <option value="AB-"@if (old('bloodgroup') == 'AB-') selected @endif>AB-</option>
                </select>
                <div class="text-red-700 ">
                    @error('bloodgroup')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Post</label>
                <input class="w-full border border-gray-200" value="{{ old('post') }}" type="text" name="post"
                    id="post">
                <div class="text-red-700 ">
                    @error('post')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Entry Time</label>
                <input class="w-full border border-gray-200 " value="{{ old('entry_time') }}" type="time"
                    name="entry_time" id="entry_time">
                <div class="text-red-700 ">
                    @error('entry_time')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Exit Time</label>
                <input class="w-full border border-gray-200 " type="time" value="{{ old('exit_time') }}"
                    name="exit_time" id="exit_time">
                <div class="text-red-700 ">
                    @error('exit_time')
                        {{ $message }}
                    @enderror
                </div>
            </div>


            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Password</label>
                <input class="w-full border border-gray-200" type="password" value="{{ old('password') }}"
                    name="password" id="password">
                <div class="text-red-700 ">
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Confirmed Password</label>
                <input class="w-full border border-gray-200 " type="password" value="{{ old('password_confirmation') }}"
                    name="password_confirmation" id="password_confirmation">
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
