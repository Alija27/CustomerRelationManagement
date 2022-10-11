@extends('layouts.app')
@section('main')
    <div class="w-full bg-white border border-gray-200 shadow-md">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Edit Client</span>
            <a href="{{ route('clients.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <i class="mr-2 fa-solid fa-arrow-left"></i> Go Back </button>
            </a>

        </div>
        <form class="w-11/12 p-6 m-6 overflow-auto bg-white rounded-md " method="POST"
            action={{ route('clients.update', $client) }}>
            @method('PUT')
            @csrf
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Name</label>
                <input class="w-full border border-gray-200 " type="text" name="name" id="name"
                    value="{{ $client->name }}">
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Email</label>
                <input class="w-full border border-gray-200" type="text" name="email" id="email"
                    value={{ $client->email }}>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Address</label>
                <input class="w-full border border-gray-200" type="text" name="address" id="address"
                    value={{ $client->address }}>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Phonenumber</label>
                <input class="w-full border border-gray-200" type="number" name="phonenumber" id="phonenumber"
                    value={{ $client->phonenumber }}>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Date of birth</label>
                <input class="w-full border border-gray-200 " type="date" name="dob" id="dob"
                    value="{{ $client->dob }}">
            </div>
            {{-- <div class="mb-6">
            <label class="block font-bold text-gray-600 text-md">Added By</label>
            <input  class="w-full border border-gray-200" type="text" name="added_by" id="added_by" value={{$client->added_by}}>     
        </div> --}}

            <div class="mb-6">
                <Button class="p-2 px-4 text-white bg-indigo-600 rounded-xl">Update</Button>
            </div>
        </form>
    </div>
@endsection
