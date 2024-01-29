@extends('Main.main')
@section('title', 'Articles | OFW Serbisyo Kooperatiba')
@section('contents')
<div class="w-full h-80">
    <img class="w-full object-cover object-center h-full" src="https://images.unsplash.com/photo-1585829365295-ab7cd400c167?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="cover">
</div>

<div class="mt-8 container mx-auto">
    <div class="w-full mb-5">
        <p class="font-['lexend'] font-bold text-3xl text-[#333]">Articles</p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @forelse ($data as $value )
            <div class="max-w-xl overflow-hidden bg-white rounded-lg shadow-md dark:bg-gray-800">
                <img class="object-cover w-full h-64" src="{{ $value->article_img ? asset('storage/'.$value->article_img) : "https://images.unsplash.com/photo-1585829365295-ab7cd400c167?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" }}" alt="Article">

                <div class="p-6">
                    <div>
                        {{-- <span class="text-xs font-medium text-blue-600 uppercase dark:text-blue-400">Product</span> --}}
                        <a href="{{ route('articles',$value->article_uuid) }}" class="block mt-2 text-xl font-semibold text-gray-800 transition-colors duration-300 transform dark:text-white hover:text-gray-600 hover:underline" tabindex="0" role="link">{{ $value->article_title }}</a>
                        <p class="mt-2 text-sm text-gray-600 truncate">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Molestie parturient et sem ipsum volutpat vel. Natoque sem et aliquam mauris egestas quam volutpat viverra. In pretium nec senectus erat. Et malesuada lobortis.</p>
                    </div>

                    <div class="mt-4">
                        <div class="flex items-center">
                            <div class="flex items-center">
                                {{-- <img class="object-cover h-10 rounded-full" src="https://images.unsplash.com/photo-1586287011575-a23134f797f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=48&q=60" alt="Avatar"> --}}
                                <a href="#" class="mx-2 font-semibold text-gray-700 dark:text-gray-200" tabindex="0" role="link">{{ $value->article_author }}</a>
                            </div>
                            <span class="mx-1 text-xs text-gray-600 dark:text-gray-300">{{ date('d M Y',strtotime($value->created_at)) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="flex w-full justify-center">
                <p class="text-[#333] opacity-60 font-bold text-2xl">No Articles</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
