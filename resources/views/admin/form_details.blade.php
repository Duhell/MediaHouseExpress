@extends('admin.parts.layout')
@section('AdminContents')
    <div class="bg-slate-50 w-full overflow-y-auto h-screen">
        <div class="md:p-5 min-h-min font-['lexend'] w-full flex flex-wrap md:gap-x-6">
            <div class="stats flex shadow grow">
                <div class="stat">
                    {{-- <div class="stat-title">Welcome {{ Auth::user()->name }}</div> --}}
                    <div class="stat-value">Request Details</div>
                </div>
            </div>
        </div>
        <div class="p-4 font-['inter'] w-full max-w-7xl mx-auto  flex flex-wrap md:flex-nowrap gap-4">
            <div class="bg-white rounded-md w-full ">
                <div class="flow-root rounded-lg border border-gray-200 py-3 shadow-sm">
                    <dl class="-my-3 divide-y divide-gray-100 text-sm">
                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">First Name</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->FirstName }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Middle Name</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->MiddleName }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Last Name</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->LastName }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Sex</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->Gender }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Passport Number</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->PassportNumber }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Saudi Residence ID</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->SaudiResidenceID }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Email or Facebook</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->EmailOrFacebook }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Personal Telephone</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->PersonalTele }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Other Telephone</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->OtherTele }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Location in KSA</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->LocationKSA }}</dd>
                        </div>


                    </dl>
                </div>
            </div>

            <div class=" w-full ">
                <div class="flow-root rounded-lg bg-white  border border-gray-200 py-3 shadow-sm">
                    <dl class="-my-3 divide-y divide-gray-100 text-sm">
                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Employer Name</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->EmployerName }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Employer Telephone</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->EmployerTele }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Recruitment Agency in Saudi</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->RecruitmentAgencySaudi }}</dd>
                        </div>

                        <div class="grid grid-cols-1 gap-1 p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Recruitment Agency in Philippines</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->RecruitmentAgencyPhilippines }}</dd>
                        </div>

                        <div
                            class="grid grid-cols-1 gap-1 bg-white  rounded-md p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Downloadable Files</dt>
                            <dd class="text-gray-700 sm:col-span-2">
                                <ul>
                                    @foreach (['File_1', 'File_2', 'File_3'] as $fileKey)
                                        @php
                                            $filePath = $data->$fileKey;

                                            if ($filePath) {
                                                $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                                                $uniqueId = uniqid();
                                            } else {
                                                $fileExtension = '';
                                                $uniqueId = '';
                                            }
                                        @endphp

                                        @if ($filePath)
                                            <li><a class="hover:text-blue-500" download
                                                    href="{{ Storage::url($filePath) }}">{{ $uniqueId . '.' . $fileExtension }}</a>
                                            </li>
                                        @else
                                            <li>No file available</li>
                                        @endif
                                    @endforeach
                                </ul>
                            </dd>
                        </div>
                        <div
                            class="grid grid-cols-1 gap-1 bg-white  rounded-md p-3 odd:bg-gray-50 sm:grid-cols-3 sm:gap-4">
                            <dt class="font-medium text-gray-900">Complaints</dt>
                            <dd class="text-gray-700 sm:col-span-2">{{ $data->Complaint }}</dd>
                        </div>
                    </dl>
                </div>
                <div class="mt-3 flex justify-end gap-x-3">
                    <button class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700" onclick="window.location.href='/admin/forms'">Back</button>
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
            href="{{ route('forms',[base64_encode($data->id),"delete"]) }}"
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
