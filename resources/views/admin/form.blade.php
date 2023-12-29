@extends('admin.parts.layout')
@section('AdminContents')
<div class="bg-slate-50 overflow-y-auto w-full h-screen">
    <div class="md:p-5 min-h-min font-['lexend'] w-full flex flex-wrap md:gap-x-6">
        <div class="stats flex shadow grow">
            <div class="stat">
                {{-- <div class="stat-title">Welcome {{ Auth::user()->name }}</div> --}}
                <div class="stat-value">Request Assistance</div>
            </div>
            <div class="stat">
                <div class="form-control ">
                    <input type="search" id="search_message" placeholder="Search"
                        class="input placeholder:text-sm input-bordered w-24 md:w-auto" />
                </div>
            </div>
        </div>
    </div>
    @if (session('success'))
    {{-- <div role="alert" class="alert font-['lexend'] bg-[#addfad] w-full max-w-md mx-auto">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>{{ session('success') }}</span>
    </div> --}}
    <dialog open id="my_modal_2" class="modal ">
        <div class="modal-box">
          <h3 class="font-bold text-lg">Notification!</h3>
          <div class="flex items-center py-2 gap-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span>{{ session('success') }}</span>
          </div>
        </div>
        <form method="dialog" class="modal-backdrop">
          <button>close</button>
        </form>
      </dialog>
    @endif
    <div>
        <div class=" md:p-5 font-['inter'] ">
            <div class="overflow-x-auto bg-white rounded-md md:mt-3">
                <p class="px-5 font-bold p-5  text-lg">Forms</p>
                <table class="table">
                  <!-- head -->
                  <thead>
                    <tr>
                      <th></th>
                      <th>Full Name</th>
                      <th>Location in KSA</th>
                      <th>Submitted From</th>
                      <th>Date submitted</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ( $forms as $form )
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td>{{ $form->FirstName }} {{ $form->MiddleName }} {{ $form->LastName }}</td>
                        <td>{{ $form->LocationKSA }}</td>
                        <td>{{ $form->Location }}</td>
                        <td>{{ date('M d, Y',strtotime($form->created_at)) }}</td>
                        <td class="whitespace-nowrap px-4 py-2">
                            <a
                              href="{{ route('forms',base64_encode($form->id)) }}"
                              class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700"
                            >
                              View
                            </a>
                          </td>
                      </tr>
                    @empty
                        <tr><th colspan="12" class="text-center">No Forms</th></tr>
                    @endforelse
                  </tbody>
                </table>
                <div class="max-w-[200px] mx-auto mt-6 ">
                    {{ $forms->links('pagination::simple-tailwind') }}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
