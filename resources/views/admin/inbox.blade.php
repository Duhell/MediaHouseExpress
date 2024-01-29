@extends('admin.parts.layout')
@section('title','Inbox | OFW Serbisyo')
@section('AdminContents')
    <div class="bg-slate-50 px-1 md:px-0 overflow-y-auto w-full h-screen">
        <div class="md:p-5 min-h-min font-['lexend'] w-full flex flex-wrap md:gap-x-6">
            <div class="stats relative before:absolute before:contents=[''] before:h-1 before:w-full before:top-0 before:bg-indigo-600 flex flex-col md:flex-row shadow grow">
                <div class="stat">
                    {{-- <div class="stat-title">Welcome {{ Auth::user()->name }}</div> --}}
                    <div class="text-2xl font-bold md:stat-value">Inbox</div>
                </div>
                <div class="stat flex">
                    <select id="sort_messages" name="sort_messages" class="select select-bordered w-full max-w-xs">
                        <option value="all" selected>All Messages</option>
                        <option value="read">Mark Read Messages</option>
                        <option value="unread">Unread Messages</option>
                    </select>
                    <div class="form-control">
                        <input type="search" id="search_message" placeholder="Search"
                            class="input placeholder:text-sm input-bordered w-24 md:w-auto" />
                    </div>
                </div>
            </div>
        </div>

        {{-- Message --}}
        <div class="grid px-1 md:px-5 mt-6 md:mt-0 md:grid-cols-2 grid-cols-1 gap-6">
            <div class="bg-white rounded-md min-h-min w-full">
                <div class="w-full p-4">
                    <p id="MessageHeader" class="font-['lexend'] text-lg">All Messages</p>
                </div>
                <hr>
                <div id="ajax_loading" class="flex p-4  flex-col gap-y-2">
                    <div class="skeleton w-full h-20"></div>
                    <div class="skeleton w-full h-20"></div>
                    <div class="skeleton w-full h-20"></div>
                    <div class="skeleton w-full h-20"></div>
                    <div class="skeleton w-full h-20"></div>
                </div>
                <div id="MessageContainer" class="p-4 h-[500px] overflow-y-auto">
                    {{-- Message Contents --}}

                </div>

            </div>
            <div id="OpenMessageContainer" class="bg-white rounded-md min-h-min w-full">
                {{-- Open message --}}
                <div class="w-full h-full flex justify-center items-center">
                    <span class="font-['lexend']">Open any message</span>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Function to handle the AJAX request
            $('#ajax_loading').show()

            function updateMessages(sortMessage) {
                try {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/admin/inbox',
                        type: "GET",
                        data: {
                            sort: sortMessage
                        },
                        success: function(response) {
                            $('#ajax_loading').hide()
                            $('#MessageContainer').html(response);
                        }
                    });
                } catch (error) {
                    console.error(error);
                }
            }

            // Initial load
            updateMessages($('#sort_messages').val());

            // Event handler for select change
            $('#sort_messages').change(function() {
                $('#MessageContainer').empty();
                var sortMessage = $(this).val();
                if (sortMessage == 'all') {
                    $('#MessageHeader').text('All Messages')
                } else if (sortMessage == 'read') {
                    $('#MessageHeader').text('Mark Read Messages')
                } else if (sortMessage == 'unread') {
                    $('#MessageHeader').text('Unread Messages')
                }
                updateMessages(sortMessage);
            });

            // For opening the message
            $(document).on('click', '.messageBox', function() {
                let data_message_id = $(this).data('message-id');
                let badgeDiv = $(this).find('.badge');
                try {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/admin/inbox',
                        type: "GET",
                        data: {
                            id: data_message_id
                        },
                        success: function(response) {
                            badgeDiv.removeClass('flex');
                            badgeDiv.addClass('hidden');
                            $('#OpenMessageContainer').empty();
                            $('#OpenMessageContainer').html(response);
                        }
                    })
                } catch (error) {
                    console.error(error)
                }
            })

            // For Marking message
            $(document).on('click', '#markMessageBTN', function() {
                let mark_id = $('#markMessageBTN').data('read-id');
                let mark_bool = $('#markMessageBTN').data('read-bool');

                try {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/admin/inbox',
                        type: "POST",
                        data: {
                            mark_id: mark_id,
                            mark_bool: mark_bool
                        },
                        success: function(response) {
                            $('#theText').text(response)
                        }
                    })
                } catch (error) {
                    console.error(error)
                }

            })

            // For delete message
            $(document).on('click', "#deleteMessageBTN", function() {
                let delete_id = $('#deleteMessageBTN').data('delete-id')
                try {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '/admin/inbox',
                        type: "POST",
                        data: {
                            delete_id: delete_id,
                        },
                        success: function(response) {
                            $('#OpenMessageContainer').empty();
                            $('#empty_message').addClass('flex');
                            updateMessages($('#sort_messages').val());
                        }
                    })
                } catch (error) {
                    console.error(error)
                }
            })

            // For Searching
            $('#search_message').on('input', function() {
                let search = $('#search_message').val()
                try {
                    if (search.length != 0) {
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '/admin/inbox',
                            type: "GET",
                            data: {
                                input: search
                            },
                            success: function(response) {
                                $('#MessageContainer').html(response);
                            }
                        });
                    }else{
                        updateMessages($('#sort_messages').val())
                    }
                } catch (error) {
                    console.error(error);
                }
            })
        });
    </script>
@endsection
