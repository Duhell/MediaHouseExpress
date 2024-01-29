@extends('Main.main')
@section('title',$data->article_title)
@section('contents')
<div class="w-full h-80">
    <img class="w-full	 object-cover object-center h-full" src="{{ $data->article_img ? asset('storage/'.$data->article_img) : "https://images.unsplash.com/photo-1585829365295-ab7cd400c167?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" }}" alt="cover">
</div>

<article class="max-w-2xl px-6 py-24 mx-auto space-y-16 text-[#333]">
    <div class="w-full mx-auto space-y-4">
        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold">{{ $data->article_title }}</h1>
        {{-- <div class="flex flex-wrap space-x-2 text-sm text-gray-400">
            <a rel="noopener noreferrer" href="#" class="p-1 hover:underline">#MambaUI</a>
            <a rel="noopener noreferrer" href="#" class="p-1 hover:underline">#TailwindCSS</a>
            <a rel="noopener noreferrer" href="#" class="p-1 hover:underline">#Angular</a>
        </div> --}}
        <p class="text-sm text-gray-400">by
            <a href="#" target="_blank" rel="noopener noreferrer" class="hover:underline pointer-events-none text-blue-400">
                <span>{{ $data->article_author }}</span>
            </a>on
            <time>{{ date('D, d F Y',strtotime($data->created_at)) }}</time>
        </p>
    </div>
    <div class="text-gray-800 text-sm sm:text-base text-justify ">
        <p>{!! nl2br(e($data->article_content)) !!}</p>
    </div>
</article>
@endsection
