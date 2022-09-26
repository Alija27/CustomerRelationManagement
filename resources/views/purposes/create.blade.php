@extends('layouts.app')
@section('main')
    <div class="w-full bg-white border border-gray-200 shadow-md">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Create Purpose</span>
            <a href="{{ route('purposes.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <- Go Back </button>
            </a>

        </div>
        <form class="w-11/12 p-6 m-6 overflow-auto bg-white rounded-md " method="POST" action={{ route('purposes.store') }}>
            @csrf
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Name</label>
                <input class="w-full border border-gray-200 " type="text" name="name" id="name">
            </div>
            <div class="mb-6">
                <Button class="p-2 px-4 text-white bg-indigo-600 rounded-xl">Create</Button>
            </div>
        </form>
    </div>
@endsection
