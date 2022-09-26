@extends('layouts.app')
@section('main')
    <div>
        <form class="w-8/12 p-6 m-6 bg-white rounded-md shadow-md" method="POST"
            action={{ route('purposes.update', $purpose) }}>
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
