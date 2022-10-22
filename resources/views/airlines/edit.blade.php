@extends('layouts.app')
@section('main')
    <div class="w-full bg-white border border-gray-200 shadow-md">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Edit airline</span>
            <a href="{{ route('airlines.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <i class="mr-2 fa-solid fa-arrow-left"></i> Go Back </button>
            </a>

        </div>
        <form class="w-11/12 p-6 m-6 overflow-auto bg-white rounded-md " method="POST"
            action={{ route('airlines.update', $airline) }}>
            @method('PUT')
            @csrf
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Title</label>
                <input class="w-full border border-gray-200 " value="{{ old('title') }}" type="text" name="title"
                    id="title" value="{{ $airline->title }}">
                <div class="text-red-700 ">
                    @error('title')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Type</label>
                <select class="block w-full border-gray-200" name="type" id="type">
                    <option value="International" @if ($airline->type == 'International') selected @endif>International</option>
                    <option value="Domestic" @if ($airline->type == 'Domestic') selected @endif>Domestic</option>
                </select>
                <div class="text-red-700 ">
                    @error('type')
                        {{ $message }}
                    @enderror
                </div>
            </div>


            <div class="mb-6">
                <Button class="p-2 px-4 text-white bg-indigo-600 rounded-xl">Update</Button>
            </div>
        </form>
    </div>
@endsection
