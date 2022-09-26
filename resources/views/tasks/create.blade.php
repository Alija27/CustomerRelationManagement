@extends('layouts.app')
@section('main')
    <div class="w-full bg-white border border-gray-200 shadow-md">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Create Purpose</span>
            <a href="{{ route('tasks.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <- Go Back </button>
            </a>

        </div>
        <form class="w-11/12 p-6 m-6 overflow-auto bg-white rounded-md " method="POST" action={{ route('tasks.store') }}>
            @csrf
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">User</label>
                <select class="w-full border border-gray-200 " name="user_id" id="user_id">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Client</label>
                <select class="w-full border border-gray-200 " name="client_id" id="client_id">
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">
                            {{ $client->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Department</label>
                <select class="w-full border border-gray-200 " name="department_id" id="department_id">

                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">
                            {{ $department->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Purpose</label>
                <select class="w-full border border-gray-200 " name="purpose_id" id="purpose_id">
                    @foreach ($purposes as $purpose)
                        <option value="{{ $purpose->id }}">
                            {{ $purpose->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Remark</label>
                <textarea class="w-full border border-gray-200 " name="remarks" id="remarks"> </textarea>
            </div>





            <div class="mb-6">
                <Button class="p-2 px-4 text-white bg-indigo-600 rounded-xl">Create</Button>
            </div>
        </form>
    </div>
@endsection
