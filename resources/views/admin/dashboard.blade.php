@extends('admin.parts.layout')
@section('AdminContents')
    <div class="bg-slate-50 w-full h-screen">
        <div class="md:p-5 min-h-min font-['lexend']  w-full flex flex-wrap md:gap-x-6">
            <div class="stats shadow grow">

                <div class="stat">
                  <div class="stat-title">Welcome {{ Auth::user()->name }}</div>
                  <div class="stat-value">Dashboard</div>
                </div>
            </div>
            <div class="stats shadow">

                <div class="stat">
                  <div class="stat-title">Total Forms</div>
                  <div class="stat-value">{{ $assistance }}</div>
                  <div class="stat-desc">{{ $todayAssistance }}  {{ $todayAssistance > 1 ? "new forms":"form" }} today</div>
                </div>

            </div>

            <div class="stats shadow">

                <div class="stat">
                  <div class="stat-title">Total Messages</div>
                  <div class="stat-value">{{ $messages }}</div>
                  <div class="stat-desc">{{ $todayMessages }}  {{ $todayMessages > 1 ? "new messages":"message" }} today</div>
                </div>

            </div>

            <div class="stats shadow">

                <div class="stat">
                  <div class="stat-title">Total Page Views</div>
                  <div class="stat-value">{{ $visitors }}</div>
                  <div class="stat-desc">{{ $percent }}% {{ $percent < 0 ? "decrease":"increase" }} than last month</div>
                </div>

            </div>
        </div>
        <div class="md:mt-8  md:p-5 font-['inter']">
            <div class="overflow-x-auto bg-white rounded-md md:mt-3">
                <p class="px-5 font-bold p-5  text-lg">Page Vistors</p>
                <table class="table">
                  <!-- head -->
                  <thead>
                    <tr>
                      <th></th>
                      <th>IP Address</th>
                      <th>User Agent</th>
                      <th>Country</th>
                      <th>Date Visited</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($paginatedVisitors as $visitor)
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $visitor->ip_address }}</td>
                            <td>{{ $visitor->user_agent }}</td>
                            <td>{{ $visitor->country }}</td>
                            <td>{{ date('M d, Y',strtotime($visitor->created_at)) }}</td>
                        </tr>
                    @empty
                        <tr><th colspan="12" class="text-center">No visitors</th></tr>
                    @endforelse
                  </tbody>
                </table>
                <div class="max-w-[200px] mx-auto mt-6 ">
                    {{ $paginatedVisitors->links('pagination::simple-tailwind') }}
                </div>
            </div>
        </div>
    </div>
@endsection
