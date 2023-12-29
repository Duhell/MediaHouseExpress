@forelse ( $Messages as $message )
<div data-message-id="{{ $message->id }}" class="bg-[#f2f2f2] messageBox mt-2 p-3 rounded-lg flex flex-col cursor-pointer hover:bg-[#d8d8d8]">
    <div class="flex justify-between">
        <span class="font-semibold items-center flex gap-x-2">{{ $message->Name }} <div class="badge text-xs badge-outline {{ $message->isRead ? "hidden":'block' }}">Unread</div> </span>
        <span class="font-semibold text-[#5a5959] text-xs">{{ $message->created_at->diffForHumans() }}</span>
    </div>
    <span class="text-sm truncate">{{ $message->Message }}</span>
</div>
@empty
<div class="text-center">
    <p>No messages</p>
</div>
@endforelse
