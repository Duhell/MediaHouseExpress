@extends('admin.parts.layout')
@section('title','Account | OFW Sebisyo')
@section('AdminContents')
@if (session('success'))
<div id="notif" class="toast z-50 font-['inter'] toast-end">
    <div class="alert text-white alert-success">
        <span>{{ session('success') }}</span>
    </div>
</div>
@endif
@if ($errors->any())
<div id="notif" class="toast font-['inter'] text-sm z-50 toast-end">
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
                <div class="stat-value">Manage Account</div>
            </div>
        </div>
    </div>
    <div class="p-4">
        <div class="flow-root rounded-lg font-['inter'] border bg-white border-gray-200 py-3 shadow-sm">
            <form method="POST" action="{{ route('updateAccount',Auth::user()->id) }}">
                @method('PATCH')
                @csrf
                <dl class="-my-3 divide-y divide-gray-100 text-sm">
                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                      <dt class="font-medium text-gray-900">User</dt>
                      <dd class="text-gray-700 sm:col-span-2"><input name="username" class="focus:p-2 focus:outline-indigo-600" placeholder="Username" value="{{ Auth::user()->name }}" type="text"></dd>
                    </div>

                    <div class="grid grid-cols-1  gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                      <dt class="font-medium text-gray-900">Role</dt>
                      <dd data-tip="hello" class="text-gray-700  sm:col-span-2 "><input name="role" class="focus:p-2 focus:outline-indigo-600 " placeholder="0,1,2" type="text" value="{{ Auth::user()->role }}" name=""></dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                      <dt class="font-medium text-gray-900">Email</dt>
                      <dd class="text-gray-700 sm:col-span-2"><input name="email" class="focus:p-2 focus:outline-indigo-600" placeholder="example@gmail.com" type="email" value="{{ Auth::user()->email }}"></dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                      <dt class="font-medium text-gray-900">Current Pasword</dt>
                      <dd class="text-gray-700 sm:col-span-2"><input name="oldpass" class="focus:p-2 focus:outline-indigo-600" placeholder="**********" type="password"></dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                      <dt class="font-medium text-gray-900">New Password</dt>
                      <dd class="text-gray-700 sm:col-span-2"><input name="password" class="focus:p-2 focus:outline-indigo-600" placeholder="**********" type="password"></dd>
                    </div>

                    <div class="grid grid-cols-1 gap-1 p-3 sm:grid-cols-3 sm:gap-4">
                        <dt class="font-medium text-gray-900"></dt>
                        <dd class="text-gray-700 sm:col-span-2">
                            <button
                            id="saveBTN"
                            disabled
                            class="inline-block disabled:bg-indigo-300 rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                            Save Changes
                            </button>
                        </dd>
                      </div>
                  </dl>
            </form>
        </div>
    </div>
</div>

<script>
    window.addEventListener('DOMContentLoaded',()=>{
        const notif = document.getElementById('notif');
        const inputs = document.querySelectorAll('input');
        const saveChangesBTN = document.getElementById('saveBTN');
        inputs.forEach(input => {
            input.addEventListener('input',()=>{
                saveChangesBTN.disabled = false;
            })
        });

        if(notif){
            setTimeout(() => {
                notif.style.display = "none";
            }, 4000);
        }

    })
</script>
@endsection
