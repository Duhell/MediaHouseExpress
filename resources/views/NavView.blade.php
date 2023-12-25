<nav class="py-3 px-5 md:px-0 z-50  absolute top-0  w-full bg-transparent transition-all duration-300">
    <div class="md:w-[1228px] w-full flex justify-between items-center mx-auto">
        <div class="w-20 h-20">
            <img class="w-full h-full" src="{{ asset('images/logo.webp') }}" alt="Logo">
        </div>
        <ul class=" hidden sm:flex  text-white  font-['inter'] text-base space-x-10">
            <li><a href="#">Home</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#about">About</a></li>
            <li>
                <div class="dropdown">
                    <div tabindex="0" role="button" class="">Help Centre</div>
                    <ul tabindex="0" class="dropdown-content z-[1] text-black menu p-2 shadow bg-white rounded-box w-32">
                      <li><a>Contact us</a></li>
                      <li><a>Item 2</a></li>
                    </ul>
                  </div>
            </li>
        </ul>
    </div>
</nav>
