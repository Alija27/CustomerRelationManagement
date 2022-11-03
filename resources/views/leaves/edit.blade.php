@extends('layouts.app')

@section('css')
    <script src="https://cdn.tiny.cloud/1/et770gnrxw4bbmxb1dosspg9lu9y8jq825tc60xddd59w8v3/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
@endsection
@section('main')
    <div class="w-full bg-white border border-gray-200 shadow-md">
        <div class="flex justify-between mb-6 border-b border-gray-200">
            <span class="m-1 mx-4 my-4 text-2xl font-bold">Edit Leave</span>
            <a href="{{ route('leaves.index') }}">
                <button class="p-2 px-4 mx-4 my-4 text-white bg-indigo-600 rounded-lg">
                    <i class="mr-1 fa-solid fa-arrow-left "></i> Go Back </button>
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
                <img src="/storage/{{ $leave->image }}" class="w-10 h-10">



            </div>
            <div class="mb-6">
                <label class="block font-bold text-gray-600 text-md">Letter</label>
                <textarea class="w-full border border-gray-200 editor" name="letter" id="letter">{{ $leave->letter }}</textarea>
            </div>
            <div class="mb-6">
                <Button type="submit" class="p-2 px-4 text-white bg-indigo-600 rounded-xl">Create</Button>
            </div>
        </form>
    </div>
@endsection

@section('js')
    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'anchor autolink charmap codesample emoticons  link lists  searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link   table mergetags | addcomment showcomments | spellcheckdialog a11ycheck | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ]
        });
    </script>
@endsection
