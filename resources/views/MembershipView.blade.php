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

    <section class="px-8 md:px-10 max-w-[1328px] mx-auto">
        <p class="mt-6 font-['lexend'] text-lg md:text-2xl">OFW Serbisyo Data</p>
        <small><i>Fields marked with an asterisk (<span class="text-red-800">*</span>) are required</i></small>
        <form method="POST" action="{{ route('SendMembership') }}"
            class="w-full mt-8 font-['inter']">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="divider col-span-full text-2xl font-bold font-['lexend'] my-10">Personal Information</div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Full Name of OFW<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="FullName"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Last Name,First Name, Middle Name" required>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Philippine Passport Number<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="PHPassport"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Mobile phone Number<span
                            class="text-red-700">*</span></label>
                    <input type="tel" name="MobilePhoneNumber"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Email Address<span
                            class="text-red-700">*</span></label>
                    <input type="email" name="EmailAddress"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Birthdate<span
                            class="text-red-700">*</span></label>
                    <input type="date" name="Birthdate"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Civil Status<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="CivilStatus"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Single, Married, etc." required>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Job Position<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="JobPosition"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Job Site<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="JobSite"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Present address of OFW" required>
                </div>


                <div class="divider col-span-full text-2xl font-bold font-['lexend'] my-10">Information of Employer</div>


                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Full Name of Employer<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="NameOfEmployer"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="" required>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Address of Employer<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="AddressOfEmployer"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Present address of OFW" required>
                </div>


                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Email Address<span
                            class="text-red-700">*</span></label>
                    <input type="text" name="EmailOfEmployer"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Present address of OFW" required>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Phone Number<span
                            class="text-red-700">*</span></label>
                    <input type="tel" name="PhoneNumberOfEmployer"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Present address of OFW" required>
                </div>

                <div class="mb-5">
                    <label class="block mb-2 text-sm font-medium text-gray-900 ">Phone Number<span
                            class="text-red-700">*</span></label>
                    <input type="tel" name="PhoneNumberOfEmployer"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  "
                        placeholder="Present address of OFW" required>
                </div>
            </div>
        </form>

    </section>
@endsection
