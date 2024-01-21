@extends('admin.parts.layout')
@section('title','Membership | OFW Serbisyo')
@section('AdminContents')
    <div class="bg-slate-50 overflow-y-auto w-full h-screen">
        <div class="md:p-5 min-h-min relative font-['lexend'] w-full flex flex-wrap md:gap-x-6">
            <div class="stats relative flex shadow grow">
                <div class="stat flex justify-between items-center">
                    <div class="stat-value">Membership</div>
                    <button class="btn btn-sm" onclick="search_modal.showModal()"><svg xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
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
        <div>
            <div class=" md:p-5 font-['inter'] ">
                <div class="overflow-x-auto bg-white rounded-md md:mt-3">
                    <p class="px-5 font-bold p-5  text-lg">Applicants</p>
                    <table class="table">
                        <!-- head -->
                        <thead>
                            <tr>
                                <th></th>
                                <th>Full Name</th>
                                <th>Civil Status</th>
                                <th>Job Position</th>
                                <th>Date submitted</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $member)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $member->FullName }}</td>
                                    <td>{{ $member->CivilStatus }}</td>
                                    <td>{{ $member->JobPosition }}</td>
                                    <td>{{ date('M d, Y', strtotime($member->created_at)) }}</td>
                                    <td class="whitespace-nowrap px-4 py-2">
                                        <a href="{{ route('admin_membership', $member->member_id) }}"
                                            class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <th colspan="12" class="text-center">No Applicants</th>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="max-w-[200px] mx-auto mt-6 ">
                        {{ $data->links('pagination::simple-tailwind') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#search_form').on('input', function() {
                let search = $('#search_form').val();
                try {
                    if(search.length != 0){
                        $.ajax({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                url: '/admin/forms/search',
                                type: "POST",
                                data: {
                                    value: search
                                },
                                success: function(response) {
                                    $('#Search_Container_Form').html(response);
                                }
                            });
                    }else{
                        $('#Search_Container_Form').empty();
                    }
                } catch (error) {
                    console.error(error);
                }
            })

        })
    </script>
@endsection
