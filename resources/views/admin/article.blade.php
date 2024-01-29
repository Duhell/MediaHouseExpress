@extends('admin.parts.layout')
@section('title','Articles | OFW Serbisyo')
@section('AdminContents')
<div class="bg-slate-50 overflow-y-auto w-full h-screen">
    <div class="md:p-5 min-h-min relative font-['lexend'] w-full flex flex-wrap md:gap-x-6 ">
        <div
            class="stats relative flex shadow grow before:absolute before:contents=[''] before:h-1 before:w-full before:top-0 before:bg-indigo-600">
            <div class="stat flex justify-between items-center">
                <div class="stat-value">Articles</div>
                <div class="flex gap-3 items-center">
                    <a href="{{ route('admin_article',"create") }}" class="text-xs text-white bg-emerald-600 px-3 py-2 rounded-lg hover:bg-emerald-900">Add Article</a>
                </div>
            </div>
        </div>
    </div>
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
    <dialog id="search_modal" class="modal font-['inter'] z-50">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="font-bold text-[#2c313a] mb-2 text-lg">Search</h3>
            <div class="form-control w-full">
                <input type="search" id="search_form" placeholder="Enter the name"
                    class="input placeholder:text-sm input-bordered w-full" />
            </div>
            <div id="Search_Container_Form" class="overflow-x-auto">

            </div>
        </div>
    </dialog>

    <div class="  md:p-5 font-['inter']">
        <div class="overflow-x-auto bg-white rounded-md md:mt-3">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Date Posted</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($articles as $article)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $article->article_title }}</td>
                        <td>{{ $article->article_author }}</td>
                        <td>{{ date('M d, Y',strtotime($article->updated_at)) }}</td>
                        <td class="flex gap-3">
                            <a href="{{ route('articles',$article->article_uuid) }}" class="text-sm text-white bg-indigo-600 rounded-lg px-2 py-1 hover:bg-indigo-900">View</a>
                            <a href="{{ route('admin_article',["edit",$article->article_uuid]) }}" class="text-sm text-white bg-cyan-600 rounded-lg px-2 py-1 hover:bg-cyan-900">Edit</a>
                            <a href="{{ route('admin_article',["delete",$article->article_uuid]) }}" class="text-sm text-white bg-rose-600 rounded-lg px-2 py-1 hover:bg-rose-900">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <th colspan="12" class="text-center">No Articles</th>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="max-w-[200px] mx-auto mt-6 ">
                {{ $articles->links('pagination::simple-tailwind') }}
            </div>
        </div>
    </div>
</div>
@endsection
