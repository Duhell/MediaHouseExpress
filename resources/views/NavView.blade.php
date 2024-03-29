<nav class="py-3 px-5 md:px-0 z-50  absolute top-0  w-full bg-transparent transition-all duration-300">
    <div class="md:w-[1228px] w-full flex justify-between items-center mx-auto">
        <div class="w-20 h-20">
            <a href="/"><img class="w-full h-full" src="{{ asset('images/logo.webp') }}" alt="Logo"></a>
        </div>
        <div class="dropdown dropdown-end block md:hidden">
            <div tabindex="0" role="button" class=""><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" class="w-6 h-6">
                <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
            </svg></div>
            <ul tabindex="0" class="dropdown-content z-[1] text-black menu p-2 shadow bg-white rounded-box w-40">
                <li><a href="/">Home</a></li>
                <li><a href="/#about">About</a></li>
                <li><a href="/#services">Services</a></li>
                <li><a href="/#team">Team</a></li>
                <li><a href="/articles">Articles</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ route('membership') }}">Membership</a></li>
                <li><a href="{{ route('tabang_tulong') }}">Tabang/Tulong</a></li>
                @auth
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @endauth
            </ul>
          </div>

        <ul class=" hidden md:flex  text-white  font-['inter'] text-base space-x-10">
            <li><a href="/" class="hover:underline hover:underline-offset-4">Home</a></li>
            <li><a href="/#about" class="hover:underline hover:underline-offset-4">About</a></li>
            <li><a href="/#services" class="hover:underline hover:underline-offset-4">Services</a></li>
            <li><a href="/#team" class="hover:underline hover:underline-offset-4">Team</a></li>
            <li><a href="/articles" class="hover:underline hover:underline-offset-4">Articles</a></li>
            <li>
                <div class="dropdown">
                    <div tabindex="0" role="button" class="hover:underline hover:underline-offset-4">Help Centre</div>
                    <ul tabindex="0" class="dropdown-content z-[1] text-black menu p-2 shadow bg-white rounded-box min-w-min">
                      <li><a href="{{ route('contact') }}">Contact</a></li>
                      <li><a href="{{ route('membership') }}">Membership</a></li>
                      <li><a href="{{ route('tabang_tulong') }}">Tabang/Tulong</a></li>
                    </ul>
                  </div>
            </li>
            @auth
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @endauth
        </ul>
    </div>
</nav>
