@extends('Main.main')
@section('title', 'Contact | OFW Serbisyo Kooperatiba')
@section('contents')
@if (session('success'))
<div id="success" class="toast z-50 font-['inter'] toast-top toast-center">
    <div class="alert text-white alert-success">
        <span>📣 {{ session('success') }}</span>
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
    <p class="text-slate-200 text-2xl md:text-4xl font-['lexend']">Contact Us</p>
</section>

<section data-aos="fade-up" data-aos-duration="600" class="bg-gray-100">
    <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 gap-x-16 gap-y-8 lg:grid-cols-5">
        <div class="lg:col-span-2 lg:py-12">
            <p class="max-w-xl text-3xl font-bold font-['lexend']">
                Please Reach Us!
            </p>
          <p class="max-w-xl text-base font-['inter']">
            Discovering, caring, understanding: making our way in new places with kindness. Helping, sharing, getting along: crossing borders to connect with others. Solving, cheering, connecting: turning worries into chances for worldwide friendship.
          </p>

          <div class="mt-8">
            <p class="max-w-xl text-3xl font-bold font-['lexend']">
                Location
            </p>

            <address class="mt-2 not-italic">FW Serbisyo't Kooperatiba
                ni Tirso Nieva Paglicawan <br>
                Media House Express
                LG03, Globe Telecom Plaza Tower 2, Madison Street, Mandaluyong City, Metro Manila</address>
          </div>
        </div>

        <div class="rounded-lg bg-white p-8 shadow-lg lg:col-span-3 lg:p-12">
          <form method="POST" action="{{ route('SendContact') }}" class="space-y-4">
            @csrf
            <input id="location" type="hidden" name="Location" value="">
            <div>
              <label class="sr-only" for="name">Name</label>
              <input
                style="border:1px solid rgba(0,0,0,0.6);"
                class="w-full rounded-lg border-gray-200 p-3 text-sm"
                placeholder="Name"
                name="Name"
                type="text"
                id="name"
              />
            </div>

            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
              <div>
                <label class="sr-only" for="email">Email</label>
                <input
                  style="border:1px solid rgba(0,0,0,0.6);"
                  class="w-full rounded-lg border-gray-200 p-3 text-sm"
                  placeholder="Email address"
                  type="email"
                  name="EmailAddress"
                  id="email"
                  required
                />
              </div>

              <div>
                <label class="sr-only" for="phone">Phone</label>
                <input
                  style="border:1px solid rgba(0,0,0,0.6);"
                  class="w-full rounded-lg border-gray-200 p-3 text-sm"
                  placeholder="Phone Number"
                  name="PhoneNumber"
                  type="tel"
                  id="phone"
                  required
                />
              </div>
            </div>

            <div>
              <label class="sr-only" for="message">Message</label>

              <textarea
                style="border:1px solid rgba(0,0,0,0.6);"
                class="w-full rounded-lg border-gray-200 p-3 text-sm"
                placeholder="Message"
                rows="8"
                name="Message"
                id="message"
                required
              ></textarea>
            </div>

            <div class="mt-4">
              <button
                type="submit"
                class="inline-block w-full rounded-lg bg-gray-900 px-5 py-3 font-medium text-white sm:w-auto">
                Send Message
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <script>
    window.addEventListener('DOMContentLoaded',()=>{
        const location = document.getElementById('location');
        location.value = sessionStorage.getItem('location');
    })
  </script>

@endsection
