@extends('Main.main')
@section('contents')

    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-lg mt-[60px] md:mt-[120px]">
            <h1 class="text-center text-2xl font-bold text-gray-900 sm:text-3xl">Welcome Admin</h1>

            {{-- <p class="mx-auto mt-4 max-w-md text-center text-gray-500">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati sunt dolores deleniti
        inventore quaerat mollitia?
      </p> --}}

            <form method="POST" action="{{ route('ToDashboard') }}"
                class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
                @if (session('success'))
                    <div id="toast" class="toast toast-top toast-center">
                        <div class="alert alert-success">
                            <span>{{ session('success') }}</span>
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    <div id="toast" class="toast toast-top toast-center">
                        <div class="alert alert-error">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
                @csrf
                <p class="text-center text-lg font-medium">Sign in to your account</p>

                <div>
                    <label for="email" class="sr-only">Email</label>

                    <div class="relative">
                        <input type="email" name="email"
                            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                            placeholder="Enter email" />

                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                            </svg>
                        </span>
                    </div>
                </div>

                <div>
                    <label for="password" class="sr-only">Password</label>

                    <div class="relative">
                        <input type="password" name="password"
                            class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                            placeholder="Enter password" />

                        <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </span>
                    </div>
                </div>

                <button type="submit"
                    class="block w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white">
                    Log in
                </button>

                <p class="text-center text-sm text-gray-500">
                    <a class="underline" href="/">Go to Website</a>
                </p>
            </form>
        </div>
    </div>
    <script>
        window.addEventListener('DOMContentLoaded', () => {
            let toast = document.getElementById('toast');
            if (toast) {
                setTimeout(() => {
                    toast.style.display = "none";
                }, 4000);
            }
        });
    </script>
@endsection