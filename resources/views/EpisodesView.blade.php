<section class="w-[1228px]  mx-auto mt-[100px]  py-6 min-h-min">
    <div class="flex  mb-[56px] justify-between">
        <div>
            <p class="font-['lexend'] text-[32px] w-[440px] font-bold">Provide Protection and Support for OFW's Worldwide</p><br>
            <p class="font-['inter'] text-base w-[628px] font-normal">Explore Our Journey and Stay Connected with the Latest Developments in Our Ongoing Mission to Safeguard and Empower Overseas Filipino Workers (OFWs) Across the Globe.</p>
        </div>
        <div>
            <iframe class="rounded-md" width="560" height="315" src="https://www.youtube.com/embed/MFkqMB2EbjY?si=haBkq05Ng0_nIHq0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
    <p class="text-center relative font-['inter'] text-lg before:contents-[''] before:absolute before:bottom-[-5px] before:w-12 before:h-1 before:bg-[#333]">More Episode</p>
    <div class="flex mt-[40px] gap-x-[32px]">
        @php
            $links = [
                'https://www.youtube.com/embed/LWgu29PXlb8?si=jZ6Y5Trl5yyQPFej',
                'https://www.youtube.com/embed/RgGCbsoLPn4?si=6yVRk0Sx295Ca0Zl',
                'https://www.youtube.com/embed/cofN7PvzARo?si=pji3uGK_lMsp3T-M'
            ]
        @endphp

        @forelse ($links as $link )
            <iframe class="rounded-md" width="100%" height="315" src="{{ $link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        @empty
        @endforelse
    </div>
</section>
