<div class="p-4 w-full flex items-center justify-between gap-x-3">
    <div>
        <span class="font-['lexend']">Message</span>
    </div>
    <div id="mark_delete_btn">
        @include('admin.tables.smallparts.buttons')
    </div>
</div>
<div class="flow-root p-4">
    <dl class="-my-3 divide-y divide-gray-100 text-sm">

      <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
        <dt class="font-medium text-gray-900">Name</dt>
        <dd class="text-gray-700 sm:col-span-2">{{ $data->Name }}</dd>
      </div>

      <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
        <dt class="font-medium text-gray-900">Email</dt>
        <dd class="text-gray-700 sm:col-span-2">{{ $data->EmailAddress }}</dd>
      </div>


      <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
        <dt class="font-medium text-gray-900">Phone Number</dt>
        <dd class="text-gray-700 sm:col-span-2">{{ $data->PhoneNumber }}</dd>
      </div>

      <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
        <dt class="font-medium text-gray-900">Date Sent</dt>
        <dd class="text-gray-700 sm:col-span-2">{{ date('F d, Y',strtotime($data->created_at)) }}</dd>
      </div>

      <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
        <dt class="font-medium text-gray-900">Location</dt>
        <dd class="text-gray-700 sm:col-span-2">{{ $data->Location ? $data->Location : "Unknown" }}</dd>
      </div>

      <div class="grid grid-cols-1 gap-1 py-3 sm:grid-cols-3 sm:gap-4">
        <dt class="font-medium text-gray-900">Content</dt>
        <dd class="text-gray-700 sm:col-span-2">
            {{ $data->Message }}
        </dd>
      </div>
    </dl>
</div>
