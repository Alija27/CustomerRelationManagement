@extends('layouts.app')
@section('main')
    <div class="w-full bg-white border border-gray-200 shadow-md">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Create Client</span>
            <a href="{{ route('clients.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <i class="mr-2 fa-solid fa-arrow-left"></i>Go Back </button>
            </a>

        </div>
        <form class="w-11/12 p-6 m-6 overflow-auto bg-white rounded-md " method="POST" action={{ route('clients.store') }}>
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
                <input class="w-full border border-gray-200" value="{{ old('phonenuber') }}" type="number"
                    name="phonenumber" id="phonenumber">
                <div class="text-red-700 ">
                    @error('phonenumber')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Date of birth</label>
                <input class="w-full border border-gray-200 " value="{{ old('dob') }}" type="date" name="dob"
                    id="dob">
                <div class="text-red-700 ">
                    @error('dob')
                        {{ $message }}
                    @enderror
                </div>
            </div>


            {{-- <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Added By</label>
            <input  class="w-full border border-gray-200" type="text" name="added_by" id="added_by">     
        </div> --}}

            <div class="mb-6">
                <Button class="p-2 px-4 text-white bg-indigo-600 rounded-xl">Create</Button>
            </div>
        </form>
    </div>
@endsection
