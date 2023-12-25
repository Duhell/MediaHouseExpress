@extends('Main.main')
@section('contents')
<section class="h-[300px] grid place-items-center w-full bg-gray-900">
    <p class="text-slate-200 text-2xl md:text-4xl font-['lexend']">Contact Us</p>
</section>

<section class="bg-gray-100">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
        <div class="lg:col-span-2 lg:py-12">
            <p class="max-w-xl text-3xl font-bold font-['lexend']">
                Reach to us!
            </p>
          <p class="max-w-xl text-base font-['inter']">
            Discovering, caring, understanding: making our way in new places with kindness. Helping, sharing, getting along: crossing borders to connect with others. Solving, cheering, connecting: turning worries into chances for worldwide friendship.
          </p>

          <div class="mt-8">
            <p class="max-w-xl text-3xl font-bold font-['lexend']">
                Location
            </p>

            <address class="mt-2 not-italic">Manila Office Address c/o MUG CORPORATE OFFICE: Unit #4, Plaridel Masonic Temple Grand Lodge of the Philippines 1440 San Marcelino St., Ermita, Manila 1000</address>
          </div>
        </div>

        <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
          <form action="" class="space-y-4">
            <div>
              <label class="sr-only" for="name">Name</label>
              <input
                class="w-full rounded-lg border-gray-200 p-3 text-sm"
                placeholder="Name"
                type="text"
                id="name"
              />
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <div>
                <label class="sr-only" for="email">Email</label>
                <input
                  class="w-full rounded-lg border-gray-200 p-3 text-sm"
                  placeholder="Email address"
                  type="email"
                  id="email"
                />
              </div>

              <div>
                <label class="sr-only" for="phone">Phone</label>
                <input
                  class="w-full rounded-lg border-gray-200 p-3 text-sm"
                  placeholder="Phone Number"
                  type="tel"
                  id="phone"
                />
              </div>
            </div>

            <div>
              <label class="sr-only" for="message">Message</label>

              <textarea
                class="w-full rounded-lg border-gray-200 p-3 text-sm"
                placeholder="Message"
                rows="8"
                id="message"
              ></textarea>
            </div>

            <div class="mt-4">
              <button
                type="submit"
                class="inline-block w-full rounded-lg bg-gray-900 px-5 py-3 font-medium text-white sm:w-auto">
                Send
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
@endsection
