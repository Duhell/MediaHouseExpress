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
        <td>{{ $value->FirstName }} {{ $value->MiddleName }} {{ $value->LastName }}</td>
        <td>{{ date('F d,Y',strtotime($value->created_at)) }}</td>
        <td class="whitespace-nowrap px-4 py-2">
            <a href="{{ route('forms', base64_encode($value->id)) }}"
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
