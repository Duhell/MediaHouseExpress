<section id="episodes" class="md:w-[1228px] w-full px-5 md:px-0  mx-auto mt-[50px] md:mt-[100px]  py-6 h-[1300px] md:h-auto">
    <div class="flex flex-wrap gap-y-3 md:gap-0 mb-[56px] justify-between">
        <div data-aos="fade-right">
            <p class="font-['lexend'] text-2xl md:text-[32px] md:w-[440px] w-full font-bold">Provide Protection and Support for OFW's Worldwide</p><br>
            <p class="font-['inter'] text-base md:w-[628px] w-full font-normal">Explore Our Journey and Stay Connected with the Latest Developments in Our Ongoing Mission to Safeguard and Empower Overseas Filipino Workers (OFWs) Across the Globe.</p>
        </div>
        <div class="w-full h-[250px] md:w-[560px] md:h-[315px]">
            @if ($latest_episode != null)
                <iframe class="rounded-md h-full w-full" src="https://www.youtube.com/embed/{{ $latest_episode }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            @else
                <div class="w-full bg-slate-500 rounded-md text-white h-full flex justify-center items-center font-['inter']">
                    <span>No Latest Episode</span>
                </div>
            @endif
        </div>
    </div>
    <p class="text-center relative font-['inter'] text-md before:contents-[''] before:absolute before:bottom-[-5px] before:w-12 before:h-1 before:bg-[#333]">More Episode</p>
    <div class="flex flex-wrap md:flex-nowrap h-[250px] md:h-[315px] mt-[40px] gap-y-4 md:gap-y-0 md:gap-x-[32px]">

        @forelse ($episodes as $episode )
            <iframe class="rounded-md h-full" width="100%" src="https://www.youtube.com/embed/{{ $episode->yt_url }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        @empty
            <div class="w-full bg-slate-500 rounded-md text-white h-full flex justify-center items-center font-['inter']">
                <span>No More Episodes</span>
            </div>
        @endforelse
    </div>
</section>
