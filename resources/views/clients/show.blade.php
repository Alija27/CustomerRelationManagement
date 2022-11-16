@extends('layouts.app')
@section('main')
    <div class="top-0 w-full bg-white border border-gray-200 shadow-md ">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Client Information</span>
            <a href="{{ route('clients.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <i class="fa-solid fa-arrow-left"></i> Go Back </button>
            </a>

        </div>
        <div class="p-6 m-6 ">

            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Name</label>
                <input class="w-full bg-gray-200 border border-gray-200" type="text" name="name" id="name"
                    disabled value={{ $client->name }}>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Email</label>
                <input class="w-full bg-gray-200 border border-gray-200 bg-ray-200" type="text" name="email"
                    id="email" disabled value="{{ $client->email }}">
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Address</label>
                <input class="w-full bg-gray-200 border border-gray-200" type="text" name="address" id="address"
                    disabled value="{{ $client->address }}">
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Phonenumber</label>
                <input class="w-full bg-gray-200 border border-gray-200" type="number" name="phonenumber" id="phonenumber"
                    disabled value="{{ $client->phonenumber }}">
            </div>

            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Date of Birth</label>
                <input class="w-full bg-gray-200 border border-gray-200" type="text" name="name" id="name"
                    disabled value={{ $client->dob }}>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Added By</label>
                <input class="w-full bg-gray-200 border border-gray-200" type="text" name="name" id="name"
                    disabled value={{ $client->user->name }}>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Assigned To</label>
                <input class="w-full bg-gray-200 border border-gray-200" type="text" name="name" id="name"
                    disabled value={{ $client->assigned }}>
            </div>




        </div>

    </div>
@endsection
