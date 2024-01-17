<section data-aos="fade-up" id="team" class="md:w-[1228px] px-5 md:px-0 w-full  min-h-min mx-auto mt-[150px] md:mt-[100px]">
    <div class="w-full text-center font-['lexend'] text-2xl md:text-[32px] font-bold">
        <p>Meet the Team</p>
    </div>
    <div class="grid mt-8 md:grid-cols-2 grid-cols-1 place-items-center gap-y-4 md:gap-y-0 md:gap-x-6">
        <div class="relative w-full block overflow-hidden rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-8">
            <span class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>

            <div class="sm:flex sm:justify-between sm:gap-4">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 sm:text-xl">
                        Tirso Paglicawan
                    </h3>

                    <p class="mt-1 text-xs font-medium text-gray-600">Founder of  OFW Serbisyo</p>
                </div>

                <div class="hidden sm:block sm:shrink-0">
                    <img alt="True CEO"
                        src="{{ asset('images/co-founder2.webp') }}"
                        class="h-16 w-16 rounded-lg object-cover shadow-sm" />
                </div>
            </div>

            <div class="mt-4">
                <p class="w-full text-sm text-gray-500">
                    Anchor, "OFW Serbisyo't Kooperatiba" podcast program over Media House Express, the Philippines' first ever internet radio and television.
                </p>
            </div>

            <dl class="mt-6 flex items-center justify-between gap-4 sm:gap-6">
                <div class="flex flex-col-reverse">
                    <dt class="text-sm items-center flex gap-3 font-medium text-gray-600">
                        <a  href=""><iconify-icon icon="logos:facebook"  class="border rounded-full p-1 border-blue-600"></iconify-icon></a>
                        <a  href=""><iconify-icon icon="skill-icons:instagram"  class="border rounded-full p-1 border-rose-600"></iconify-icon></a>
                        <a  href=""><iconify-icon icon="devicon:twitter"  class="border rounded-full p-1 border-gray-900"></iconify-icon></a>
                    </dt>
                    <dd class="text-xs text-gray-500 mb-3">Socials</dd>
                </div>

                <div >
                    <button onclick="ceo_modal.showModal()"
                        class="group relative inline-block text-sm font-medium text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                        <span
                            class="absolute inset-0 translate-x-0.5 translate-y-0.5 bg-indigo-600 transition-transform group-hover:translate-x-0 group-hover:translate-y-0"></span>

                        <span class="relative block border border-current bg-white px-8 py-3"> Read More </span>
                    </button>
                </div>
            </dl>
        </div>

        <div class="relative w-full block overflow-hidden rounded-lg border border-gray-100 p-4 sm:p-6 lg:p-8">
            <span class="absolute inset-x-0 bottom-0 h-2 bg-gradient-to-r from-green-300 via-blue-500 to-purple-600"></span>

            <div class="sm:flex sm:justify-between sm:gap-4">
                <div>
                    <h3 class="text-lg font-bold text-gray-900 sm:text-xl">
                        Ferdenand (Ibraheem) Lawag Sabado
                    </h3>

                    <p class="mt-1 text-xs font-medium text-gray-600">The Co-Founder/Developer of Monitoring system of OFW</p>
                </div>

                <div class="hidden sm:block sm:shrink-0">
                    <img alt="COFOUNDER"
                        src="{{ asset('images/true-ceo.webp') }}"
                        class="h-16 w-16 rounded-lg object-cover shadow-sm" />
                </div>
            </div>

            <div class="mt-4">
                <p class="w-full text-sm text-gray-500">
                    General Manager of Yaramay Computer Maintenance Services. He is presently,
                    working at the King Khalid Military City in the Kingdom of Saudi Arabia (KSA).

                </p>
            </div>

            <dl class="mt-6 flex items-center justify-between gap-4 sm:gap-6">
                <div class="flex flex-col-reverse">
                    <dt class="text-sm items-center flex gap-3 font-medium text-gray-600">
                        <a  href=""><iconify-icon icon="logos:facebook" class="border rounded-full p-1 border-blue-600"></iconify-icon></a>
                        <a  href=""><iconify-icon icon="skill-icons:instagram"  class="border rounded-full p-1 border-rose-600"></iconify-icon></a>
                        <a  href=""><iconify-icon icon="devicon:twitter"  class="border rounded-full p-1 border-gray-900"></iconify-icon></a>
                    </dt>
                    <dd class="text-xs text-gray-500 mb-3">Socials</dd>
                </div>

                <div >
                    <button onclick="co_founder_modal.showModal()"
                        class="group relative inline-block text-sm font-medium text-indigo-600 focus:outline-none focus:ring active:text-indigo-500">
                        <span
                            class="absolute inset-0 translate-x-0.5 translate-y-0.5 bg-indigo-600 transition-transform group-hover:translate-x-0 group-hover:translate-y-0"></span>

                        <span class="relative block border border-current bg-white px-8 py-3"> Read More </span>
                    </button>
                </div>
            </dl>
        </div>


    </div>
    @include('DialogView')
</section>
