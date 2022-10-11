@extends('layouts.app')
@section('main')
    <div class="w-full bg-white border border-gray-200 shadow-md">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Edit Leave</span>
            <a href="{{ route('leaves.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <- Go Back </button>
            </a>

        </div>
        <form class="w-11/12 p-6 m-6 overflow-auto bg-white rounded-md " method="POST" enctype="multipart/form-data"
            action={{ route('leaves.update', $leave->id) }}>
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Subject</label>
                <input class="w-full border border-gray-200 " type="text" name="subject" id="subject"
                    value={{ $leave->subject }}>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Image</label>
                <input class="w-full border border-gray-200" type="file" name="image" id="image">

            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Letter</label>
                <textarea class="w-full border border-gray-200" name="letter" id="letter">{{ $leave->letter }}</textarea>
            </div>
            <div class="mb-6">
                <Button type="submit" class="p-2 px-4 text-white bg-indigo-600 rounded-xl">Create</Button>
            </div>
        </form>
    </div>
@endsection
