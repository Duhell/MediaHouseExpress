@extends('admin.parts.layout')
@section('title', 'Episodes | OFW Serbisyo')
@section('AdminContents')
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
<div class="bg-slate-50 overflow-y-auto w-full h-screen">
    <div class="md:p-5 min-h-min font-['lexend'] w-full flex flex-wrap md:gap-x-6">
        <div class="stats flex shadow grow">
            <div class="stat">
                <div class="stat-value">Manage Youtube Episodes</div>
            </div>
        </div>
    </div>

    <div class="px-5 font-['inter']">
        <div class="overflow-x-auto grid grid-cols-2 bg-white p-3 h-[500px]">
            <div class="overflow-x-auto">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Youtube URL</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                        @forelse ($data  as $video )
                        <tr>
                            <td>{{ $video->title }}</td>
                            <td><a target="_blank" class="text-indigo-600" href="{{ $video->yt_url }}">{{ $video->yt_url }}</a></td>
                            <td>
                                <a
                              href="{{ route('episodes', ['delete'=>'delete','delete_id' => base64_encode($video->id)]) }}"
                              class="inline-block rounded bg-rose-600 px-4 py-2 text-xs font-medium text-white hover:bg-rose-700"
                            >
                              Delete
                            </a></td>
                          </tr>
                        @empty
                            <tr>
                                <td>No Episode</td>
                            </tr>
                        @endforelse
                  </tbody>
                </table>
            </div>
            <div class="p-1">
                <form method="POST" action="{{ route('add_episode') }}" class="max-w-sm mx-auto">
                    @csrf
                    <span class="font-['inter'] text-sm md:text-2xl text-[#333] font-semibold">Add latest episode</span>
                    <div class="mt-4">
                        <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m15.75 10.5 4.72-4.72a.75.75 0 0 1 1.28.53v11.38a.75.75 0 0 1-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 0 0 2.25-2.25v-9a2.25 2.25 0 0 0-2.25-2.25h-9A2.25 2.25 0 0 0 2.25 7.5v9a2.25 2.25 0 0 0 2.25 2.25Z" />
                                  </svg>
                            </span>
                            <input autocomplete="off" name="title" required type="text" id="website-admin"
                                class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  "
                                placeholder="Episode 1">
                        </div>
                    </div>

                    <div class="mt-4">
                        <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900">Youtube URL</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                                </svg>


                            </span>
                            <input autocomplete="off" name="yt_url" required type="text" id="website-admin"
                                class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  "
                                placeholder="https://www.youtube.com/watch?v=0x3t9yoo9KI">
                        </div>
                    </div>
                   <div class="mt-6">
                        <button type="submit"
                            class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                            Add Episode
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
