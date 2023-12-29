@extends('admin.parts.layout')
@section('AdminContents')
<div class="bg-slate-50 overflow-y-auto w-full h-screen">
    <div class="md:p-5 min-h-min font-['lexend'] w-full flex flex-wrap md:gap-x-6">
        <div class="stats flex shadow grow">
            <div class="stat">
                <div class="stat-value">Manage Account</div>
            </div>
        </div>
    </div>
    <div class="p-4">
        <div class="flow-root rounded-lg font-['inter'] border bg-white border-gray-200 py-3 shadow-sm">
            <form action="">
                <dl class="-my-3 divide-y divide-gray-100 text-sm">
                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                      <dt class="font-medium text-gray-900">User</dt>
                      <dd class="text-gray-700 sm:col-span-2"><input class="focus:p-2 focus:outline-indigo-600" placeholder="Username" value="{{ Auth::user()->name }}" type="text"></dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                      <dt class="font-medium text-gray-900">Role</dt>
                      <dd class="text-gray-700 sm:col-span-2"><input class="focus:p-2 focus:outline-indigo-600" placeholder="0,1,2" type="text" value="{{ Auth::user()->role != 0 ? "Admin":"Administrator" }}" name=""></dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                      <dt class="font-medium text-gray-900">Email</dt>
                      <dd class="text-gray-700 sm:col-span-2"><input class="focus:p-2 focus:outline-indigo-600" placeholder="example@gmail.com" type="email" value="{{ Auth::user()->email }}"></dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                      <dt class="font-medium text-gray-900">Current Pasword</dt>
                      <dd class="text-gray-700 sm:col-span-2"><input class="focus:p-2 focus:outline-indigo-600" placeholder="**********" type="password"></dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                      <dt class="font-medium text-gray-900">New Password</dt>
                      <dd class="text-gray-700 sm:col-span-2"><input class="focus:p-2 focus:outline-indigo-600" placeholder="**********" type="password"></dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-900"></dt>
                        <dd class="text-gray-700 sm:col-span-2">
                            <a
                            href=""
                            class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                            Save Changes
                          </a>
                        </dd>
                      </div>
                  </dl>
            </form>
        </div>
    </div>
</div>
@endsection
