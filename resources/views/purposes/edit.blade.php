@extends('layouts.app')
@section('main')
    <div>
        <div class="w-full bg-white border border-gray-200 shadow-md">
            <div class="flex justify-between mb-6 border-b border-gray-200">
                <span class="m-1 mx-4 my-4 text-2xl font-bold">Edit Purpose</span>
                <a href="{{ route('purposes.index') }}">
                    <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                        <i class="mr-2 fa-solid fa-arrow-left"></i> Go Back </button>
                </a>

            </div>
            <form class=" p-6 m-6  method="POST" action={{ route('purposes.update', $purpose) }}>
                @method('PUT')
                @csrf
                @if ($errors->any())
                    {{ $errors }}
                @endif
                <div class="mb-6">
                    <label class="block font-bold text-gray-600 text-md">Name</label>
                    <input class="w-11/12 border border-gray-200" type="text" name="name" id="name"
                        value={{ $purpose->name }}>
                </div>


                <div class="mb-6">
                    <Button class="p-2 text-white bg-indigo-600 rounded-xl">Update</Button>
                </div>

            </form>
        </div>
    @endsection
