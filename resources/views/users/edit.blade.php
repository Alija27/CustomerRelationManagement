@extends('layouts.app')
@section('main')
    <div class="w-full bg-white border border-gray-200 shadow-md ">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Edit User</span>
            <a href="{{ route('users.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <i class="fa-solid fa-arrow-left"></i> Go Back </button>
            </a>

        </div>
        <form class="w-11/12 p-6 m-6 bg-white rounded-md" method="POST" action={{ route('users.update', $user) }}>
            @method('PUT')
            @csrf
            {{-- @if ($errors->any())
                {{ $errors }}
            @endif --}}
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Name</label>
                <input class="w-full border border-gray-200" type="text" name="name" id="name"
                    value={{ old('name') ?? $user->name }}>
                <div class="text-red-700 ">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Email</label>
                <input class="w-full border border-gray-200" type="text" name="email" id="email"
                    value="{{ old('email') ?? $user->email }}">
                <div class="text-red-700 ">
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Address</label>
                <input class="w-full border border-gray-200" type="text" name="address" id="address"
                    value="{{ old('address') ?? $user->address }}">
                <div class="text-red-700 ">
                    @error('address')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Phonenumber</label>
                <input class="w-full border border-gray-200" type="number" name="phonenumber"
                    id="phonenumber"value="{{ old('phonenumber') ?? $user->phonenumber }}">
                <div class="text-red-700 ">
                    @error('phonenumber')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Status</label>
                <select class="w-full border border-gray-200" type="text" name="status" id="status"
                    value={{ old('status') ?? $user->status }}>
                    <option value="active"@if ($user->status == 'active') selected @endif>Active</option>
                    <option value="inactive"@if ($user->status == 'inactive') selected @endif>Inactive</option>
                </select>
                <div class="text-red-700 ">
                    @error('status')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">


                <label class="block font-bold text-gray-600 text-md">Role</label>
                <select class="w-full border border-gray-200" name="role" id="role">
                    {{-- @foreach (\App\Models\User::CRUD_ROLES as $role)
               <option value="{{$role}}" @if ($user->role == $role) selected @endif> {{$role}} </option>
               @endforeach --}}
                    <option value="admin" @if ($user->role == 'admin') selected @endif> Admin </option>
                    <option value="user" @if ($user->role == 'user') selected @endif> User </option>
                    <option value="desk" @if ($user->role == 'desk') selected @endif> Desk</option>


                </select>

                {{-- <input  class="w-11/12 border border-gray-200" type="text" name="role" id="role" value="{{$user->role}}"> --}}
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Date Of Birth</label>
                <input class="w-full border border-gray-200" type="date" name="dob" id="dob"
                    value="{{ old('dob') ?? $user->dob }}">
            </div>

            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Bloodgroup</label>
                <select value={{ old('bloodgroup') ?? $user->bloodgroup }} class="w-full border border-gray-200"
                    type="text" name="bloodgroup" id="bloodgroup">
                    <option disabled selected>Choose Blood Group</option>
                    <option value="A+"@if ($user->bloodgroup == 'A+') selected @endif>A+</option>
                    <option value="A-"@if ($user->bloodgroup == 'A-') selected @endif>A-</option>
                    <option value="B+"@if ($user->bloodgroup == 'B+') selected @endif>B+</option>
                    <option value="B-"@if ($user->bloodgroup == 'B-') selected @endif>B-</option>
                    <option value="O+"@if ($user->bloodgroup == 'O+') selected @endif>O+</option>
                    <option value="O-"@if ($user->bloodgroup == 'O-') selected @endif>O-</option>
                    <option value="AB+"@if ($user->bloodgroup == 'AB+') selected @endif>AB+</option>
                    <option value="AB-"@if ($user->bloodgroup == 'AB-') selected @endif>AB-</option>

                </select>
                <div class="text-red-700 ">
                    @error('bloodgroup')
                        {{ $message }}
                    @enderror
                </div>
            </div>



            <div class="mb-6">


                <label class="block font-bold text-gray-600 text-md">Post</label>


                <input class="w-full border border-gray-200" type="text" name="post" id="post"
                    value="{{ old('post') ?? $user->post }}">
                <div class="text-red-700 ">
                    @error('post')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Entry Time</label>
                <input class="w-full border border-gray-200" type="time" name="entry_time" id="entry_time"
                    value="{{ old('entry_time') ?? $user->entry_time }}">
                <div class="text-red-700 ">
                    @error('entry_time')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Exit Time</label>
                <input class="w-full border border-gray-200 " type="time" name="exit_time" id="exit_time"
                    value="{{ old('exit_time') ?? $user->exit_time }}">
                <div class="text-red-700 ">
                    @error('exit_time')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-6">
                <Button class="p-2 text-white bg-indigo-600 rounded-xl">Update</Button>
            </div>

        </form>
    </div>
@endsection
