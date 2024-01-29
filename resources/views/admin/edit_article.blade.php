@extends('admin.parts.layout')
@section('title','Articles | OFW Serbisyo')
@section('AdminContents')
<div class="bg-slate-50 overflow-y-auto w-full h-screen">
    <div class="md:p-5 min-h-min relative font-['lexend'] w-full flex flex-wrap md:gap-x-6 ">
        <div class="stats relative flex shadow grow before:absolute before:contents=[''] before:h-1 before:w-full before:top-0 before:bg-indigo-600">
            <div class="stat flex justify-between items-center">
                <div class="stat-value">Edit Article</div>
                <a href="{{ route('admin_article') }}" class="text-sm bg-indigo-600 text-white px-2 py-1 rounded-md">Back</a>
            </div>
        </div>
    </div>
    <div class="md:p-5 font-['inter'] ">
        <form method="POST" enctype="multipart/form-data" action="{{ route('update_article',$data->article_uuid) }}">
            @csrf
            @method('PATCH')
            <div class="flex flex-col mb-5">
                <label>Title</label>
                <div class="flex gap-3">
                    <input name="article_title" type="text" class="input grow input-bordered w-full" value="{{ $data->article_title }}"/>
                    <input name="article_img" type="file" class="file-input file-input-bordered"/>
                </div>
            </div>

            <div class="flex flex-col mb-5">
                <label>Content</label>
                <textarea name="article_content" class="textarea h-[375px] textarea-bordered textarea-lg w-full max-w-screen" >
                    {{ $data->article_content }}
                </textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-800 text-white px-6 py-2 rounded-md">Update article</button>
            </div>
        </form>
    </div>
</div>


@endsection
