@extends('admin.parts.layout')
@section('title','Applicant | OFW Serbisyo')
@section('AdminContents')
    <div class="bg-slate-50 w-full overflow-y-auto h-screen">
        <div class="md:p-5 min-h-min font-['lexend'] w-full flex flex-wrap md:gap-x-6">
            <div class="stats flex shadow grow">
                <div class="stat">
                    {{-- <div class="stat-title">Welcome {{ Auth::user()->name }}</div> --}}
                    <div class="stat-value">Applicant Details</div>
                </div>
            </div>
        </div>
        <div class="p-4 font-['inter'] w-full max-w-7xl mx-auto  flex flex-wrap md:flex-nowrap gap-4">
            <div class="bg-white rounded-md w-full ">
                <div class="flow-root rounded-lg border border-gray-200 py-3 shadow-sm">
                    <dl class="-my-3 divide-y divide-gray-100 text-sm">
                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-semibold font-['lexend'] text-[#333] text-lg col-span-full ">Personal Information</dt>
                        </div>
                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Full Name</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->FullName }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Philippine Passport Number</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->PHPassport }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Phone Number</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->MobilePhoneNumber }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Email Address</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->EmailAddress }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Birthdate</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->Birthdate }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Civil Status</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->CivilStatus }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Job Position</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->JobPosition }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Job Site</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->JobSite }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-semibold font-['lexend'] text-[#333] text-lg col-span-full ">Employer Information</dt>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Full Name</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->NameOfEmployer }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Address</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->AddressOfEmployer }}</dd>
                        </div>
                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Email</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->EmailOfEmployer }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Phone Number</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->PhoneNumberOfEmployer }}</dd>
                        </div>

                    </dl>
                </div>
            </div>

            <div class=" w-full ">
                <div class="flow-root rounded-lg bg-white  border border-gray-200 py-3 shadow-sm">
                    <dl class="-my-3 divide-y divide-gray-100 text-sm">
                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-semibold font-['lexend'] text-[#333] text-lg col-span-full ">Recruitment Agency in the Philippines</dt>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Agency</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->AgencyPH }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Phone Number</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->AgencyPH_Number }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Email</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->EmailOfAgencyPH }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-semibold font-['lexend'] text-[#333] text-lg col-span-full ">Recruitment Agency in the Foreign Country</dt>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Agency</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->AgencyForeign }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Phone Number</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->AgencyForeign_Number }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Email</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->EmailOfForeignPH }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-semibold font-['lexend'] text-[#333] text-lg col-span-full ">II</dt>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Next of Kin/ Kamag-anak ng OFW</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->OFWRelative }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Relationship with OFW</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->RelationshipOFW }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Contact Number</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->PhoneNumberII }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Address in the Philippines</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->AddressII }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Email Address</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->EmailII }}</dd>
                        </div>
                    </dl>


                </div>
                <div class="mt-3 flex justify-end gap-x-3">
                    <button class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700" onclick="window.location.href='/admin/membership'">Back</button>
                    <button class="inline-block rounded bg-rose-600 px-4 py-2 text-xs font-medium text-white hover:bg-rose-700" onclick="deleteModal.showModal()">Delete</button>
                </div>
            </div>

        </div>
    </div>

    <dialog id="deleteModal" class="modal font-['inter']">
        <div class="modal-box">
          <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
          </form>
          <h3 class="font-bold text-lg">Are you sure?</h3>
          <p class="py-4">This will result to permanent delete of the record.</p>
          <div class="divider"></div>
          <div class="flex flex-wrap justify-end gap-x-3">
            <a
            href="{{ route('admin_membership',['member_id'=>$data->member_id,'delete'=> true]) }}"
            class="inline-block rounded bg-rose-600 px-4 py-2 text-xs font-medium text-white hover:bg-rose-700">
            Confirm Delete
          </a>
          {{-- <form method="dialog">
              <button class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">Cancel</button>
          </form> --}}
          </div>
        </div>
      </dialog>
@endsection
