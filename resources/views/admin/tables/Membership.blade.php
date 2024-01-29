<table class="table">
    <!-- head -->
    <thead>
      <tr>
        <th></th>
        <th>Full Name</th>
        <th>Date Submitted</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @forelse ( $data as $value )
      <tr>
        <th>{{ $loop->iteration }}</th>
        <td>{{ $value->FullName }}</td>
        <td>{{ date('F d,Y',strtotime($value->created_at)) }}</td>
        <td class="whitespace-nowrap px-4 py-2">
            <a href="{{ route('admin_membership', $value->member_id) }}"
                class="inline-block rounded bg-indigo-600 px-4 py-2 text-xs font-medium text-white hover:bg-indigo-700">
                View
            </a>
        </td>
      </tr>
      @empty
          <tr>
            <td>No results</td>
        </tr>
      @endforelse

    </tbody>
  </table>
