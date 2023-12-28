@extends('Main.main')
@section('contents')
    @if (session('success'))
        <div id="success" class="toast z-50 font-['inter'] toast-top toast-center">
            <div class="alert text-white alert-success">
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div id="err" class="toast z-50 font-['inter'] text-sm z-50 toast-end">
            <div class="alert flex flex-col text-white alert-error">
                @foreach ($errors->all() as $error)
                    <span class="w-full">{{ $loop->iteration }}. {{ $error }}</span>
                @endforeach
            </div>
        </div>
    @endif
    <dialog id="my_modal_4" class="modal font-['inter']">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="font-bold text-lg">Request for Assistance!</h3>
            <p class="py-4">As much as possible please provide all information requested. The local government confirms
                that all information given is for the use of the local government only and not to be disseminated or
                distributed to private individuals or corporation.
            </p>
            <p class="py-4">Hangga't maari ibigay ang impormasyong hinihingi. Sinisigurado ng local government na lahat ng
                impormasyong ibibigay ay para lamang sa paggamit ng local government at hindi ipamimigay o ipamamahagi sa
                mga pribadong indibidwal o korporasyon.</p>
            <div class="modal-action">
                <form method="dialog">
                    <!-- if there is a button, it will close the modal -->
                    <button id="agreeBTN" class="btn">I Agree</button>
                </form>
            </div>
        </div>
    </dialog>
    <section class="h-[300px] grid place-items-center w-full bg-gray-900">
        <span class="text-slate-200 text-2xl md:text-4xl font-['lexend']">Tabang / Tulong </span>
    </section>

    <section class="px-8 md:px-10 max-w-[1328px] mx-auto">
        <p class="mt-6 font-['lexend'] text-lg md:text-2xl">Request Assistance Form</p>
        <small><i>Fields marked with an asterisk (<span class="text-red-800">*</span>) are required</i></small>
        <form enctype="multipart/form-data" method="POST" action="{{ route('SendRequest') }}"
            class="w-full mt-8 font-['inter']">
            @csrf
            <div class="flex flex-col md:grid md:grid-cols-3  md:gap-x-6">
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">First Name / Pangalan <span
                            class="text-red-700">*</span></label>
                    <input type="text" name="FirstName"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Middle Name / Panggitnang Apelyido </label>
                    <input type="text" name="MiddleName"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="">
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Last Name / Apelyido <span
                            class="text-red-700">*</span></label>
                    <input type="text" name="LastName"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>
                <div class="divider col-span-3"></div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Passport number / Numero ng Pasaporte <span
                            class="text-red-700">*</span></label>
                    <input type="text" name="PassportNumber"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Saudi Residence ID (Iqama) Number (If
                        available) / Numero ng Saudi Residence ID o Iqama (Kung meron)</label>
                    <input type="text" name="SaudiResidenceID"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="">
                </div>
                <div class="divider col-span-3"></div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Gender / Kasarian <span
                            class="text-red-700">*</span></label>
                    <select name="Gender"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Email or Facebook name / Email or Pangalan
                        sa Facebook <span class="text-red-700">*</span></label>
                    <input type="text" name="EmailOrFacebook"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Occupation / Trabaho <span
                            class="text-red-700">*</span></label>
                    <select name="Occupation"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option value="Household Service Workers (Domestic Workers,Drivers,Gardeners,etc.)">Household
                            Service Workers (Domestic Workers,Drivers,Gardeners,etc.)</option>
                        <option value="Low Skilled (Construction Worker, Laborers,Cooks and Waiters,etc.)">Low Skilled
                            (Construction Worker, Laborers,Cooks and Waiters,etc.)</option>
                        <option
                            value="Highly Skilled (Wielders,Plumbers,Beauticians,Office Workers,Assistant Nurses,Computer Technicians, etc.)">
                            Highly Skilled (Wielders,Plumbers,Beauticians,Office Workers,Assistant Nurses,Computer
                            Technicians, etc.)</option>
                        <option value="Nurse">Nurse</option>
                        <option value="Professional/Skilled (Engineers,Doctors,Dentist,Architects,Accountants, etc.)">
                            Professional/Skilled (Engineers,Doctors,Dentist,Architects,Accountants, etc.)</option>
                    </select>
                </div>
                <div class="divider col-span-3"></div>


                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Personal Telephone Number (If any) /
                        Sariling Telepono (Kung meron)</label>
                    <input type="text" name="PersonalTele"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="">
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Other Telephone Numbers To Contact (If
                        any)/ Ibang Telepono (Kung meron)</label>
                    <input type="text" name="OtherTele"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="">
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 "><br>Location in KSA / Lokasyon sa
                        Saudi<span class="text-red-700">*</span></label>
                    <input type="text" name="LocationKSA"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>
                <div class="divider col-span-3"></div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 "><br>Name of Employer / Pangalan ng
                        Employer</label>
                    <input type="text" name="EmployerName"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="">
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Telephone Number of Employer (If Known) /
                        Telepono ng Amo (Kung Alam)</label>
                    <input type="text" name="EmployerTele"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="">
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Name of Saudi Recruitment Agency (If
                        Known) / Pangalan ng Recruitment Agency sa Saudi (Kung Alam)</label>
                    <input type="text" name="RecruitmentAgencySaudi"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="">
                </div>

                <div class="mb-5 col-span-3">

                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Name of Recruitment Agency in the
                        Philippines (If Known) / Pangalan ng Recruitment Agency sa Pilipinas (Kung Alam)</label>
                    <input type="text" name="RecruitmentAgencyPhilippines"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="">
                </div>
                <div class="divider col-span-3"></div>
                <div class="mb-5 col-span-3 text-lg font-['lexend']"><span>Upload Proofs</span></div>
                <div class="mb-5">
                    <input type="file" name="File_1" class="file-input file-input-bordered w-full max-w-xs" />
                </div>

                <div class="mb-5">
                    <input type="file" name="File_2" class="file-input file-input-bordered w-full max-w-xs" />
                </div>

                <div class="mb-5">
                    <input type="file" name="File_3" class="file-input file-input-bordered w-full max-w-xs" />
                </div>

                <div class="divider col-span-3"></div>

                <div class="mb-5 col-span-3">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Complaint / Reklamo<span
                            class="text-red-700">*</span></label>

                    <textarea name="Complaint" style="border:1px solid rgba(0,0,0,.7);"
                        class="mt-2 py-2 px-5 w-full rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" rows="4"
                        placeholder="Leave your complaints here..." required></textarea>
                </div>

            </div>


            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
        </form>

    </section>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            let modal = document.getElementById('my_modal_4')
            let agreeBTN = document.getElementById('agreeBTN')

            if (document.cookie.indexOf('modalShown=true') == -1) {
                modal.showModal()
            }

            agreeBTN.addEventListener('click', () => {
                let expiration = new Date();
                expiration.setTime(expiration.getTime() + (24 * 60 * 60 * 1000)); // 24 hrs

                document.cookie = `modalShown=true;expires=${expiration.toGMTString()};path=/`
            })

        })
    </script>
@endsection
