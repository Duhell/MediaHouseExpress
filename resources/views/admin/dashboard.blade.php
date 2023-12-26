@extends('admin.parts.layout')
@section('AdminContents')
    <div class="bg-slate-50 w-full h-screen">
        {{-- <div class=" w-full md:p-5 font-['lexend'] text-2xl">
            <p>Dashboard</p>
        </div> --}}
        <div class="md:p-5 min-h-min font-['lexend']  w-full flex flex-wrap md:gap-x-6">
            <div class="stats shadow grow">

                <div class="stat">
                  <div class="stat-title">Welcome Admin</div>
                  <div class="stat-value">Dashboard</div>
                </div>
            </div>
            <div class="stats shadow">

                <div class="stat">
                  <div class="stat-title">Total Users</div>
                  <div class="stat-value">89</div>
                  <div class="stat-desc">20 users today</div>
                </div>

            </div>

            <div class="stats shadow">

                <div class="stat">
                  <div class="stat-title">Total Message</div>
                  <div class="stat-value">100</div>
                  <div class="stat-desc">30 new messages today</div>
                </div>

            </div>

            <div class="stats shadow">

                <div class="stat">
                  <div class="stat-title">Total Page Views</div>
                  <div class="stat-value">89,400</div>
                  <div class="stat-desc">21% more than last month</div>
                </div>

            </div>
        </div>
        <div class="md:mt-8 md:p-5 font-['inter']">
            <p class="px-5 font-bold text-lg">Page Vistors</p>
            <div class="overflow-x-auto md:mt-3">
                <table class="table">
                  <!-- head -->
                  <thead>
                    <tr>
                      <th></th>
                      <th>Name</th>
                      <th>Country</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- row 1 -->
                    @php
                        $users = ['Ryan','Villarma','Templa']
                    @endphp
                    @forelse ($users as $user)
                        <tr class="hover">
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $user }}</td>
                            <td>PH</td>
                            <td>Dec. 26, 2023 </td>
                        </tr>
                    @empty
                        <tr>No Visitors</tr>
                    @endforelse

                  </tbody>
                </table>
              </div>
        </div>
    </div>
@endsection
