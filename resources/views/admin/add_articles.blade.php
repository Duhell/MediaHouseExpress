@extends('admin.parts.layout')
@section('title','Articles | OFW Serbisyo')
@section('AdminContents')
<div class="bg-slate-50 overflow-y-auto w-full h-screen">
    @if (session('success'))
    <div id="success" class="toast z-50 font-['inter'] toast-top toast-center">
        <div class="alert text-white alert-success">
            <span>📣 {{ session('success') }}</span>
        </div>
    </div>
    @endif
    @if ($errors->any())
    <div id="err" class="toast font-['inter'] text-sm z-50 toast-end">
        <div class="alert flex flex-col text-white alert-error">
            @foreach ($errors->all() as $error)
            <span class="w-full">{{ $loop->iteration }}. {{ $error }}</span>
            @endforeach
        </div>
    </div>
    @endif
    <div class="md:p-5 min-h-min relative font-['lexend'] w-full flex flex-wrap md:gap-x-6 ">
        <div class="stats relative flex shadow grow before:absolute before:contents=[''] before:h-1 before:w-full before:top-0 before:bg-indigo-600">
            <div class="stat flex justify-between items-center">
                <div class="stat-value">Create new article</div>
                <a href="{{ route('admin_article') }}" class="text-sm bg-indigo-600 text-white px-2 py-1 rounded-md">Back</a>
            </div>
        </div>
    </div>
    <div class="md:p-5 font-['inter'] ">
        <form method="POST" enctype="multipart/form-data" action="{{ route('add_article') }}">
            @csrf
            <div class="flex flex-col mb-5">
                <label>Title</label>
                <div class="flex gap-3">
                    <input required autocomplete="off" name="article_title" type="text" class="input grow input-bordered w-full" />
                    <input required autocomplete="off" name="article_img" type="file" class="file-input file-input-bordered" />
                </div>
            </div>

            <div class="flex flex-col mb-5">
                <label>Content</label>
                <textarea required name="article_content" class="textarea h-[375px] textarea-bordered textarea-lg w-full max-w-screen" ></textarea>
            </div>

            <div class="flex justify-end">
                <button class="bg-indigo-600 hover:bg-indigo-800 text-white px-6 py-2 rounded-md">Post</button>
            </div>
        </form>
    </div>
</div>


@endsection
