@extends('Main.main')
@section('title', 'Membership | OFW Serbisyo Kooperatiba')
@section('contents')
    @if (session('success'))
        <div id="success" class="toast z-50 font-['inter'] toast-top toast-center">
            <div class="alert text-white alert-success">
                <span>{{ session('success') }}</span>
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
    <section class="h-[300px] grid place-items-center w-full bg-gray-900">
        <span class="text-slate-200 text-2xl md:text-4xl font-['lexend']">Membership </span>
    </section>

    <section data-aos="fade-up" class="px-8 md:px-10 max-w-[1328px] mx-auto">
        <p class="mt-6 font-['lexend'] text-lg md:text-2xl">OFW Serbisyo Data</p>
        <small ><i>Fields marked with an asterisk (<span class="text-red-800">*</span>) are required</i></small>
        <form method="POST" action="{{ route('SendMembership') }}"
            class="w-full mt-8 font-['inter']">
            @csrf
            <div class="flex flex-wrap sm:grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="divider col-span-full text-base md:text-2xl font-bold font-['lexend'] my-10">Personal Information</div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Full Name of OFW<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="FullName"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Last Name,First Name, Middle Name" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Philippine Passport Number<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="PHPassport"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Mobile phone Number<span
                            class="text-red-700">*</span></label>
                    <input type="tel" name="MobilePhoneNumber"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Email Address<span
                            class="text-red-700">*</span></label>
                    <input type="email" name="EmailAddress"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Birthdate<span
                            class="text-red-700">*</span></label>
                    <input type="date" name="Birthdate"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Civil Status<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="CivilStatus"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Single, Married, etc." required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Job Position<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="JobPosition"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Job Site<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="JobSite"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Present address of OFW" required>
                </div>


                <div class="divider col-span-full text-base md:text-2xl font-bold font-['lexend'] my-10">Information of Employer</div>


                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Full Name of Employer<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="NameOfEmployer"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Address of Employer<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="AddressOfEmployer"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>


                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Email Address<span
                            class="text-red-700">*</span></label>
                    <input type="email" name="EmailOfEmployer"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Phone Number<span
                            class="text-red-700">*</span></label>
                    <input type="tel" name="PhoneNumberOfEmployer"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="divider col-span-full text-base md:text-2xl font-bold font-['lexend'] my-10">Recruitment Agency</div>

                <div class="mb-5 w-full col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Agency in the Philippines<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="AgencyPH"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Phone Number<span
                            class="text-red-700">*</span></label>
                    <input type="tel" name="AgencyPH_Number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Email Address<span
                            class="text-red-700">*</span></label>
                    <input type="email" name="EmailOfAgencyPH"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 w-full col-span-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Foreign Agency<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="AgencyForeign"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Phone Number<span
                            class="text-red-700">*</span></label>
                    <input type="tel" name="AgencyForeign_Number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Email Address<span
                            class="text-red-700">*</span></label>
                    <input type="email" name="EmailOfForeignPH"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="divider col-span-full text-base md:text-2xl font-bold font-['lexend'] my-10">II</div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Next of Kin/ Kamag-anak ng OFW<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="OFWRelative"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Complete name" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Relationship with OFW<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="RelationshipOFW"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Contact Number<span
                            class="text-red-700">*</span></label>
                    <input type="tel" name="PhoneNumberII"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Address in the Philippines<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="AddressII"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5 w-full">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Email Address<span
                            class="text-red-700">*</span></label>
                    <input type="email" name="EmailII"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

            </div>

            <div class="w-full flex justify-center items-center">
                <button class="py-3  w-full rounded-md bg-indigo-600 hover:bg-indigo-700 text-white">Submit</button>
            </div>
        </form>

    </section>
@endsection
